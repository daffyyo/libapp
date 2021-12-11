let Username = "";
let AdminName = "";
let currentCart = [];

function filterBooks(){
    var selectedIndex = document.getElementById("searchBy").value; //value='1'
    var searchBy = document.getElementById("searchBy").options[document.getElementById("searchBy").selectedIndex].text;
    let params = "searchBy=" + searchBy + "&search=" +  document.getElementById("search").value;
    console.log(params)

	let xhttp = new XMLHttpRequest();
	xhttp.open('GET', '/filterBooks/' + params, true);

	//Send the proper header information along with the request
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhttp.onload = function() {//Call a function when the state changes.
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			// redirect to the page after sending search request
            console.log(xhttp.readyState)
			// window.location.replace("/filteredBookList")
            window.location.replace(xhttp.responseURL)
		} else {
			alert(xhttp.responseText)
		}
	}

	xhttp.send();
}

function userRegister(){
    let obj = {Username: document.getElementById("username").value, UserPassword: document.getElementById("psw").value, Email: document.getElementById("email").value, Address: document.getElementById("addr").value, PhoneNumber: document.getElementById("phone").value}
    Username = document.getElementById("username").value;
	console.log(obj)

	let xhttp = new XMLHttpRequest();
	xhttp.open('POST', '/userRegister', true);

	//Send the proper header information along with the request
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhttp.onload = function() {//Call a function when the state changes.
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			// redirect to the page after sending search request
			Username=document.getElementById("username").value;
            window.location.replace("/userProfile/Username=" +  document.getElementById("username").value)
		} else {
			alert(xhttp.responseText)
		}
	}

	xhttp.send(JSON.stringify(obj));
}

function userLogin(){
    let params = "?Username=" + document.getElementById("username").value + "&UserPassword=" +  document.getElementById("psw").value;
	Username = document.getElementById("username").value;
	console.log(params)

	let xhttp = new XMLHttpRequest();
	xhttp.open('GET', '/login' + params, true);

	//Send the proper header information along with the request
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhttp.onload = function() {//Call a function when the state changes.
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			// redirect to the page after sending search request
			Username=document.getElementById("username").value;
            window.location.replace("/userProfile/Username=" +  document.getElementById("username").value)
		} else {
			alert(xhttp.responseText)
		}
	}

	xhttp.send();
}

function adminLogin(){
	let params = "?AdminName=" + document.getElementById("admin").value + "&AdminPassword=" +  document.getElementById("psw").value;
	AdminName = document.getElementById("admin").value;
	console.log(params)

	let xhttp = new XMLHttpRequest();
	xhttp.open('GET', '/checkAdminLogin/' + params, true);

	//Send the proper header information along with the request
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhttp.onload = function() {//Call a function when the state changes.
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			// redirect to the page after sending search request
			AdminName=document.getElementById("admin").value;
            window.location.replace("viewReport")
		} else {
			alert(xhttp.responseText)
		}
	}

	xhttp.send();
}

function submitBookManagement(){
	const rbs = document.getElementById('radio').checked;
	let obj;
	let selectedIndex = document.getElementById("operations").value;
	let operations = document.getElementById("operations").options[document.getElementById("operations").selectedIndex].text;
    if (!rbs){
		console.log("111")
		obj = {newPublisher: false, operation: operations, BookName: document.getElementById("bookName").value, ISBN: document.getElementById("ISBN").value, Author: document.getElementById("author").value, Category: document.getElementById("category").value, Price: document.getElementById("price").value, Book_In_Stock: document.getElementById("stock").value, Publisher_ID: document.getElementById("publisher").value}
	}else{
		console.log("222")
		obj = {newPublisher: true
				,operation: operations, BookName: document.getElementById("bookName").value
				,ISBN: document.getElementById("ISBN").value
				, Author: document.getElementById("author").value
				, Category: document.getElementById("category").value
				, Price: document.getElementById("price").value
				, Book_In_Stock: document.getElementById("stock").value
				, Publisher_ID: document.getElementById("publisher").value
				, BankingAccount: document.getElementById("banking").value
				, Name: document.getElementById("name").value
				, EmailAddress: document.getElementById("email").value
				, Address: document.getElementById("address").value
				, PhoneNumber: document.getElementById("phone").value
				}
	}
		console.log(obj)

	let xhttp = new XMLHttpRequest();
	xhttp.open('POST', '/bookManage', true);

	//Send the proper header information along with the request
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhttp.onload = function() {//Call a function when the state changes.
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			// redirect to the page after sending search request
            window.location.replace("/BookList")
		} else {
			alert(xhttp.responseText)
		}
	}

	xhttp.send(JSON.stringify(obj));
}

function addToCart(bookId, bookName, bookPrice, bookCategory, bookAuthor){
	let newOrderBook = {
		"id": bookId,
		"BookName": bookName,
		"Category": bookCategory,
		"Price": bookPrice,
		"Author": bookAuthor
	}
	currentCart.push(newOrderBook);
	console.log(currentCart)
	alert("successfully add one item in the bag.")
}

$(document).on('click', ".open-AddBookDialog", function (event) {
	var sum = 0;
	$.each(currentCart, function(i, el){
		$(".modal-body #bookName-"+i).val(el.BookName);
		$(".modal-body #author-"+i).val(el.Author);
		$(".modal-body #category-"+i).val(el.Category);
		$(".modal-body #price-"+i).val(el.Price);
		sum += parseFloat(el.Price);
	})
	console.log(sum)
	$(".modal-body #subtotal").val(sum);
	if(sum >= 50){
		$(".modal-body #shipping").val(0.00);
		var total = 1.13 * sum;
		$(".modal-body #total").val(total.toFixed(2));
	}else{
		$(".modal-body #shipping").val(2.99);
		var total = 1.13 * sum + 2.99;
		$(".modal-body #total").val(total.toFixed(2));
	}
  })

function reply_click(clicked_id){
	let item = {BookName:document.getElementById(clicked_id).getElementsByClassName("event-bookName")[0]["firstElementChild"].innerText,
				Author: document.getElementById(clicked_id).getElementsByClassName("event-author")[0]["firstElementChild"].innerText,
				Category: document.getElementById(clicked_id).getElementsByClassName("event-category")[0]["firstElementChild"].innerText,
				Price: document.getElementById(clicked_id).getElementsByClassName("event-price")[0]["firstElementChild"].innerText
				};

	bag.push(item);

	let obj = {Username: Username, shoppingBag: bag}
	let xhttp = new XMLHttpRequest();
	xhttp.open('POST', '/shoppingBag', true);

	//Send the proper header information along with the request
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhttp.onload = function() {//Call a function when the state changes.
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			// redirect to the page after sending search request
            // window.location.replace("/checkOut")
		} else {
			alert(xhttp.responseText)
		}
	}

	xhttp.send(JSON.stringify(obj));
}

function viewReport(clicked_id){
	var params;
	if(clicked_id === "666"){
		params = "?Report_ID=" + clicked_id + "&OrderNumber=" + document.getElementById("orderNumber").value;
	}else{
		params = "?Report_ID=" + clicked_id;
	}

	console.log(params)
	let xhttp = new XMLHttpRequest();
	xhttp.open('GET', '/report'+ params, true);

	//Send the proper header information along with the request
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhttp.onload = function() {//Call a function when the state changes.
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			// redirect to the page after sending search request
				console.log(xhttp.responseText)
				var text = xhttp.responseText;
				text = text.replace("[{", "");
				text = text.replace("}]", "");
				if(clicked_id=="444"){
					text = text.replaceAll('"', "");
					$(".modal-body #message-text").val(text);
				}else if(clicked_id=="666"){
					text = text.split(",")[1].replaceAll('"', "");
					$(".modal-body #orderStatus").val(text);
				}
		} else {
			alert(xhttp.responseText)
		}
	}

	xhttp.send();
}

function confirmOrder(username){
	var date_ob = new Date();
	var day = ("0" + date_ob.getDate()).slice(-2);
	var month = ("0" + (date_ob.getMonth() + 1)).slice(-2);
	var year = date_ob.getFullYear();
	
	var date = year + "-" + month + "-" + day;
	console.log(date);
		
	var hours = date_ob.getHours();
	var minutes = date_ob.getMinutes();
	var seconds = date_ob.getSeconds();
	
	var dateTime = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
	console.log(dateTime);

	var bookOrder = [];
	currentCart.forEach(function(el){
		bookOrder.push(el.BookName);
	})
	let obj = {Username: Username, Order_ID: Math.floor(100000 + Math.random() * 900000), OrderStatus: 'RECEIVED', OrderPayment: document.getElementById("billing").value, OrderDelivery: document.getElementById("address").value, OrderDatetime: dateTime, OrderAmount: document.getElementById("total").value, bookOrder: bookOrder}
	console.log(obj)

	let xhttp = new XMLHttpRequest();
	xhttp.open('POST', '/addOrder', true);
	xhttp.setRequestHeader('Content-type', 'application/json');
	xhttp.send(JSON.stringify(obj));

	xhttp.onload = function() {//Call a function when the state changes.
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			// redirect to the page after sending search request
            alert("Successfully submitted order!")
			window.location.replace("/userProfile")
		} else {
			alert(xhttp.responseText)
		}
	}
}