document.addEventListener("DOMContentLoaded", function() {
    var downloadBtn = document.getElementById("download-btn");
    downloadBtn.addEventListener("click", function() {
        var ticketSummary = document.getElementById("ticket-summary");
        var ticketSummaryContent = ticketSummary.innerHTML;

        var blob = new Blob([ticketSummaryContent], { type: "text/html" });

        var a = document.createElement("a");
        a.href = window.URL.createObjectURL(blob);
        a.download = "ticket_summary.html";

        document.body.appendChild(a);
        a.click();

        document.body.removeChild(a);
    });
});
