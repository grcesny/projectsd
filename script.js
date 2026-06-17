function sendMessage(){
    const input = document.getElementById("user-input");
    const messages = document.getElementById("messages");

    if (!input || !messages) return;

    const text = input.value.trim();
    if (text === "") return;
    messages.innerHTML += "<div class='user-message'>" + text + "</div>";
    input.value = "";

    messages.scrollTop = messages.scrollHeight;

    messages.innerHTML += "<div class='bot-message' id='loading'>Bot sedang mengetik...</div>";

    // kirim ke backend 
    fetch("chatbot.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ message: text })
    })
    .then(res => res.json())
    .then(data => {
        const loading = document.getElementById("loading");
        if (loading) loading.remove();

        function formatBotText(text){

    text = text.replace(/•/g, "<br>•");
    text = text.replace(/\n/g, "<br>");

    return text;
}
        messages.innerHTML += "<div class='bot-message'>" + formatBotText(data.response) + "</div>";
        messages.scrollTop = messages.scrollHeight;
    })
    .catch(() => {
        const loading = document.getElementById("loading");
        if (loading) loading.remove();

        messages.innerHTML += "<div class='bot-message'>Bot: Gagal terhubung ke server</div>";
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("user-input");

    if (input) {
        input.addEventListener("keydown", function(e){
            if (e.key === "Enter") {
                e.preventDefault();
                sendMessage();
            }
        });
    }
});


function quickChat(text){
    const input = document.getElementById("user-input");
    if (!input) return;

    input.value = text;
    sendMessage();
}

