let productcontainer=document.querySelector("#container");
let product=fetch('https://fakestoreapi.com/product')
.then(res=res.json())
.then(product=>showproduct(products));

