fetch('/api/cart/add',{
method:'POST',
headers:{
'Content-Type':'application/json',
'Authorization':'Bearer '+localStorage.getItem('token')
},
body:JSON.stringify({
product_id:1
})
})
.then(res=>res.json())
.then(data=>{
alert(data.message);
});
