const fs = require('fs');
const path = require('path');
const express = require('express');
const bodyParser = require('body-parser');

const productRoutes = require('../routes/product');
const HttpError = require('../model/http-error');

const app = express();
const cors = require('cors');

app.use(cors());

app.use(bodyParser.json());

app.use('/assets/images', express.static(path.join('upload', 'images')));

app.use((req, res, next) => {
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader(
    'Access-Control-Allow-Headers',
    'Origin, X-Requested-With, Content-Type, Accept, Authorization'
  );
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, OPTIONS, PATCH, DELETE');

  next();
});

app.use('/api/products', productRoutes);

app.use((req, res, next) => {
  const error = new HttpError('Route not found!', 404);
  throw error;
});

app.use((error, req, res, next) => {
  if (req.file) {
    fs.unlink(req.file.path, err => {
      console.log(err);
    });
  }
  if (res.headerSent) {
    return next(error);
  }
  res.status(error.code || 500);
  res.json({ message: error.message || 'An unknown error occurred!' });
});

module.exports = app;