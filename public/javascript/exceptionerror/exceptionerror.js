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
    error_desc.textContent = "Not Found: The requested resource could not be found.";
} else if (parsedData['error'] == 405) {
    error_desc.textContent = "Method Not Allowed: The request method is not supported for the requested resource.";
} else if (parsedData['error'] == 401) {
    error_desc.textContent = "Unauthorized: Authentication is required and has failed or not yet been provided.";
} else if (parsedData['error'] == 402) {
    error_desc.textContent = "Payment Required: Reserved for future use.";
} else if (parsedData['error'] == 403) {
    error_desc.textContent = "Forbidden: The server is refusing to fulfill the request.";
} else if (parsedData['error'] == 406) {
    error_desc.textContent = "Not Acceptable: The requested resource cannot generate content acceptable to the client.";
} else if (parsedData['error'] == 407) {
    error_desc.textContent = "Proxy Authentication Required: The client must first authenticate itself with the proxy.";
} else if (parsedData['error'] == 408) {
    error_desc.textContent = "Request Timeout: The server timed out waiting for the request.";
} else if (parsedData['error'] == 409) {
    error_desc.textContent = "Conflict: The request could not be processed due to a conflict in the current resource state.";
} else if (parsedData['error'] == 410) {
    error_desc.textContent = "Gone: The requested resource was previously in use but is no longer available.";
} else if (parsedData['error'] == 411) {
    error_desc.textContent = "Length Required: The request did not specify the length of its content.";
} else if (parsedData['error'] == 412) {
    error_desc.textContent = "Precondition Failed: The server does not meet the preconditions of the request.";
} else if (parsedData['error'] == 413) {
    error_desc.textContent = "Payload Too Large: The request is larger than the server can process.";
} else if (parsedData['error'] == 414) {
    error_desc.textContent = "URI Too Long: The provided URI was too long for the server to process.";
} else if (parsedData['error'] == 415) {
    error_desc.textContent = "Unsupported Media Type: The server does not support the media type of the request entity.";
} else if (parsedData['error'] == 416) {
    error_desc.textContent = "Range Not Satisfiable: The client requested a portion of the file that cannot be supplied.";
} else if (parsedData['error'] == 417) {
    error_desc.textContent = "Expectation Failed: The server cannot meet the requirements of the Expect request-header field.";
} else if (parsedData['error'] == 418) {
    error_desc.textContent = "I'm a Teapot: This is an Easter egg status code and not meant for practical use.";
} else if (parsedData['error'] == 421) {
    error_desc.textContent = "Misdirected Request: The request was directed at a server that cannot respond.";
} else if (parsedData['error'] == 422) {
    error_desc.textContent = "Unprocessable Entity: The request has semantic errors and cannot be followed.";
} else if (parsedData['error'] == 423) {
    error_desc.textContent = "Locked: The requested resource is locked.";
} else if (parsedData['error'] == 424) {
    error_desc.textContent = "Failed Dependency: The request failed because it depended on another request that failed.";
} else if (parsedData['error'] == 425) {
    error_desc.textContent = "Too Early: The server is unwilling to risk processing a request that might be replayed.";
} else if (parsedData['error'] == 426) {
    error_desc.textContent = "Upgrade Required: The client should switch to a different protocol.";
} else if (parsedData['error'] == 428) {
    error_desc.textContent = "Precondition Required: The server requires conditional requests to prevent conflicts.";
} else if (parsedData['error'] == 429) {
    error_desc.textContent = "Too Many Requests: The user has sent too many requests in a given time period.";
} else if (parsedData['error'] == 431) {
    error_desc.textContent = "Request Header Fields Too Large: The server refuses the request due to oversized header fields.";
} else if (parsedData['error'] == 451) {
    error_desc.textContent = "Unavailable For Legal Reasons: The server refuses to serve the request due to legal reasons.";
} else if (parsedData['error'] == 500) {
    error_desc.textContent = "Internal Server Error: An unexpected condition was encountered.";
} else if (parsedData['error'] == 501) {
    error_desc.textContent = "Not Implemented: The server does not recognize the request method or lacks the ability to fulfill it.";
} else if (parsedData['error'] == 502) {
    error_desc.textContent = "Bad Gateway: The server acted as a gateway or proxy and received an invalid response.";
} else if (parsedData['error'] == 503) {
    error_desc.textContent = "Service Unavailable: The server cannot handle the request because it's overloaded or down for maintenance.";
} else if (parsedData['error'] == 504) {
    error_desc.textContent = "Gateway Timeout: The server acted as a gateway or proxy and didn't receive a timely response.";
} else if (parsedData['error'] == 505) {
    error_desc.textContent = "HTTP Version Not Supported: The server doesn't support the HTTP version in the request.";
} else if (parsedData['error'] == 506) {
    error_desc.textContent = "Variant Also Negotiates: Transparent content negotiation resulted in a circular reference.";
} else if (parsedData['error'] == 507) {
    error_desc.textContent = "Insufficient Storage: The server can't store the representation needed to complete the request.";
} else if (parsedData['error'] == 508) {
    error_desc.textContent = "Loop Detected: The server detected an infinite loop while processing the request.";
} else if (parsedData['error'] == 510) {
    error_desc.textContent = "Not Extended: Further extensions to the request are required for the server to fulfill it.";
} else if (parsedData['error'] == 511) {
    error_desc.textContent = "Network Authentication Required: The client must authenticate to gain network access.";
}



error_container.appendChild(error_desc);