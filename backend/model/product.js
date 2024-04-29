const mongoose = require('mongoose')

const Schema = mongoose.Schema

const productSchema = new Schema({
  title:{
    type:String,
    required:true
  },
  price:{
    type:Number,
    required:true
  },
  description:String,
  image:String,
  category:{
    type:String,
    enum:[
      "electronics",
      "jewelery",
      "men's clothing",
      "women's clothing"
    ]
  }
})

module.exports = mongoose.model('product',productSchema)