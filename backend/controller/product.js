const fs = require('fs');
const { validationResult } = require('express-validator');
const mongoose = require('mongoose');
const {Storage} = require('@google-cloud/storage');

const HttpError = require('../model/http-error');
const Product = require('../model/product');

const storage = new Storage();
const bucket = storage.bucket(process.env.GCLOUD_STORAGE_BUCKET);

module.exports.getAllProducts = async (req, res, next) => {
	// const limit = Number(req.query.limit) || 0;
	// const sort = req.query.sort == 'desc' ? -1 : 1;

	// Product.find()
	// .select(['-_id'])
	// .limit(limit)
	// .sort({ id: sort })
	// .then((products) => {
	// 	res.json(products);
	// })
	// .catch((err) => console.log(err));
	
	let products;
	try {
		products = await Product.find({});
	} catch (err) {
		const error = new HttpError(
			'Fetching products failed, please try again later.',
			500
		);
		return next(error);
	}
	res.json({ products });
};

module.exports.getProduct = async (req, res, next) => {
	const id = req.params.id;

	let product;
  try {
    product = await Product.findById(id);
  } catch (err) {
    const error = new HttpError(
      'Something went wrong, could not find a product.',
      500
    );
    return next(error);
  }

  if (!product) {
    const error = new HttpError(
      'Could not find product for the provided id.',
      404
    );
    return next(error);
  }

  res.json({ product });
};

module.exports.addProduct = async (req, res, next) => {
	const errors = validationResult(req);

	if (!errors.isEmpty()) {
    return next(
      new HttpError('Invalid inputs passed, please check your data.', 422)
    );
  }

	const { title, description, price, category } = req.body;
	
	let image = req.file.path.replace(/\\/g, '/');

  const createdProduct = new Product({
    title,
    description,
    price,
    category,
    image
  });

  try {
    await createdProduct.save();
  } catch (err) {
    const error = new HttpError(
      'Creating product failed, please try again.',
      500
    );
    return next(error);
  }

  res.status(201).json({ product: createdProduct });

};

module.exports.editProduct = async (req, res, next) => {
	// const errors = validationResult(req);
  // if (!errors.isEmpty()) {
  //   return next(
  //     new HttpError('Invalid inputs passed, please check your data.', 422)
  //   );
  // }

	const { title, description, price, category} = req.body;
  const productId = req.params.id;

  let product;
  try {
    product = await Product.findById(productId);
  } catch (err) {
    const error = new HttpError(
      'Something went wrong, could not update product.',
      500
    );
    return next(error);
  }

  product.title = title;
  product.description = description;
  product.price = price;
  product.category = category;

  try {
    await product.save();
  } catch (err) {
    const error = new HttpError(
      'Something went wrong, could not update product.',
      500
    );
    return next(error);
  }

  res.status(200).json({ product });
};

module.exports.deleteProduct = async (req, res, next) => {
	const productId = req.params.id;

  let product;
  try {
    product = await Product.findById(productId);
  } catch (err) {
    const error = new HttpError(
      'Something went wrong, could not delete product.',
      500
    );
    return next(error);
  }

  if (!product) {
    const error = new HttpError('Could not find product for this id.', 404);
    return next(error);
  }

  const imagePath = product.image;

  try {
    await Product.findByIdAndRemove(productId);
  } catch (err) {
    const error = new HttpError(
      'Something went wrong, could not delete product...',
      500
    );
    return next(error);
  }

  fs.unlink(imagePath, err => {
    console.log(err);
  });

  res.status(200).json({ message: 'Deleted product.' });
};