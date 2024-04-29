const express = require("express");
const { check } = require('express-validator');

const router = express.Router();
const fileUpload = require('../middleware/file-upload');
const productController = require("../controller/product");

router.get("/", productController.getAllProducts);
// router.get("/categories", product.getProductCategories);
// router.get("/category/:category", product.getProductsInCategory);
router.get("/:id", productController.getProduct);

router.post(
  "/",
  fileUpload.single('image'),
  [
    check('title')
      .not()
      .isEmpty(),
    check('description').isLength({ min: 10 }),
    check('category')
      .not()
      .isEmpty()
      .isIn([
        "electronics",
        "jewelery",
        "men's clothing",
        "women's clothing"
      ])
  ],
  productController.addProduct
);

router.put("/:id", productController.editProduct);
router.patch("/:id", productController.editProduct);

router.delete("/:id", productController.deleteProduct);

module.exports = router;