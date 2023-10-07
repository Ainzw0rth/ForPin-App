var data = document.getElementById("post-data");
var parsedData = JSON.parse(data.getAttribute("data-postdata"));

var error_container = document.getElementById("error_container");

var error_code = document.createElement("h1");
error_code.className = "error_code";
error_code.textContent = parsedData['error'];
error_container.appendChild(error_code);

var error_desc = document.createElement("h2");
error_desc.className = "error_desc";
if (parsedData['error'] == 404) {
    error_desc.textContent = "it appears that the requested URL was not found";
} else if (parsedData['error'] == 500) {
    error_desc.textContent = "Internal Server Error";
}

error_container.appendChild(error_desc);