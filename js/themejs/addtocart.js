/* -------------------------------------------------------------------------------- /
	
	Magentech jQuery
	Created by Magentech
	v1.0 - 20.9.2016
	All rights reserved.
	
/ -------------------------------------------------------------------------------- */

"use strict"

	// Cart add functions
	var cart = {
		'add': function(product_id, price, name, image, quantity=0) {
            
            if(quantity==0){
            	quantity = $("#quantity").val(); 
            }

            $.ajax({
            	url:"ajax/addtocart.php",
            	type: 'post',
            	data: {id: product_id, name: name, image: image, price: price, quantity: quantity},
            	success: function (response){
                   var data = JSON.parse(response);
            		$(".number-shopping-cart").html(data.items);
            		var txt = '';
                   $.each(data.cart, function(key, value){
                   	txt +='<tr id="cart-list-'+ key +'"><td class="text-center" style="width:70px">';
                   	txt +='<a href="product.php?id='+ key +'">';
                   	txt +='<img src="admin/uploads/product/'+ value.image +'" style="width:70px" alt="" title="" class="preview"> </a>';
                   	txt +='</td>';
                   	txt +='<td class="text-left"> <a class="cart_product_name" href="product.php?id='+ key +'">'+ value.name +'</a> </td>';
                   	txt +='<td class="text-center"> x'+ value.quantity +'</td>';
                   	txt +='<td class="text-center"> TK. '+ value.price +' </td>';
                   	txt +='<td class="text-right"><a href="#" class="fa fa-edit"></a></td>';
                   	txt +='<td class="text-right"><a onclick="cart.remove('+ key +');" class="fa fa-times fa-delete"></a></td>';
                   	txt +='</tr>';

                   });

                   $("#cart-details").html(txt);
                   $("#cart-total").html("TK. "+ data.total);

            	}
            });
			addProductNotice('Product added to Cart', '<img src="admin/uploads/product/'+ image +'" alt="'+ name +'">', '<h3><a href="product.php?id='+ product_id+'">'+ name +'"</a> added to <a href="cart.php">shopping cart</a>!</h3>', 'success');
		},
		'remove': function(product_id) {

            $.ajax({
            	url:"ajax/removetocart.php",
            	type: 'post',
            	data: {id: product_id},
            	success: function (response){
                   var data = JSON.parse(response);
            		$(".number-shopping-cart").html(data.items);
            		var txt = '';
                   $.each(data.cart, function(key, value){
                   	txt +='<tr id="cart-list-'+ key +'"><td class="text-center" style="width:70px">';
                   	txt +='<a href="product.php?id='+ key +'">';
                   	txt +='<img src="admin/uploads/product/'+ value.image +'" style="width:70px" alt="" title="" class="preview"> </a>';
                   	txt +='</td>';
                   	txt +='<td class="text-left"> <a class="cart_product_name" href="product.php?id='+ key +'">'+ value.name +'</a> </td>';
                   	txt +='<td class="text-center"> x'+ value.quantity +'</td>';
                   	txt +='<td class="text-center"> TK. '+ value.price +' </td>';
                   	txt +='<td class="text-right"><a href="#" class="fa fa-edit"></a></td>';
                   	txt +='<td class="text-right"><a onclick="cart.remove('+ key +');" class="fa fa-times fa-delete"></a></td>';
                   	txt +='</tr>';

                   });

                   $("#cart-details").html(txt);
                   $("#cart-total").html("TK. "+ data.total);

            	}
            });
			
			$("#cart-list-"+ product_id).remove();
		}
	}



	var wishlist = {
		'add': function(product_id) {
			addProductNotice('Product added to Wishlist', '<img src="img/demo/shop/product/e11.jpg" alt="">', '<h3>You must <a href="login.html">login</a>  to save <a href="product.html">Apple Cinema 30"</a> to your <a href="wishlist.html">wish list</a>!</h3>', 'success');
		}
	}
	var compare = {
		'add': function(product_id) {
			addProductNotice('Product added to compare', '<img src="img/demo/shop/product/e11.jpg" alt="">', '<h3>Success: You have added <a href="product.html">Apple Cinema 30"</a> to your <a href="compare.html">product comparison</a>!</h3>', 'success');
		}
	}

	/* ---------------------------------------------------
		jGrowl – jQuery alerts and message box
	-------------------------------------------------- */
	function addProductNotice(title, thumb, text, type) {
		$.jGrowl.defaults.closer = false;
		//Stop jGrowl
		//$.jGrowl.defaults.sticky = true;
		var tpl = thumb + '<h3>'+text+'</h3>';
		$.jGrowl(tpl, {		
			life: 4000,
			header: title,
			speed: 'slow',
			theme: type
		});
	}

