// document.addEventListener("DOMContentLoaded", function() {
    // var downloadBtn = document.getElementById("download-btn");
//     downloadBtn.addEventListener("click", function() {
//         var ticketSummary = document.getElementById("ticket-summary");
//         var ticketSummaryContent = ticketSummary.innerHTML;

//         var blob = new Blob([ticketSummaryContent], { type: "text/html" });

//         var a = document.createElement("a");
//         a.href = window.URL.createObjectURL(blob);
//         a.download = "ticket_summary.html";

//         document.body.appendChild(a);
//         a.click();

//         document.body.removeChild(a);
//     });
// });
document.getElementById('download-btn').addEventListener('click', function() {
    // Select the ticket summary container
    var ticketSummary = document.getElementById('ticket-summary');

    // Use html2canvas to capture the content of the ticket summary container
    html2canvas(ticketSummary, {
        onrendered: function(canvas) {
            // Convert the canvas to a data URL representing a PNG image
            var imageDataURL = canvas.toDataURL('image/png');

            // Create a temporary link element to trigger the download
            var downloadLink = document.createElement('a');
            downloadLink.href = imageDataURL;
            downloadLink.download = 'ticket_summary.png';

            // Append the link to the document and trigger the download
            document.body.appendChild(downloadLink);
            downloadLink.click();

            // Clean up: remove the temporary link
            document.body.removeChild(downloadLink);
        }
    });
});
