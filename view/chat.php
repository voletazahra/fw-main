<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<!-- tambahan buat sebelum buka chatnya-->
  
<button id="openChatbot" class="chatbot-button btn-primary rounded-circle">
      <i class="fas fa-comment"></i>
    </button>
    <!-- ISI -->
    <div class="container">
      <!-- FOTO -->
      <div class="row justify-content-center">
        <div class="col-md-6 foto">
          <img
            src="asset/foto-orang.png"
            alt="Tiga orang memegang ponsel"
            width="500px"
          />
        </div>
      </div>
      <!-- TULISAN -->
      <div class="row">
        <div class="col-10">
          <p style="text-align: justify; margin-right: 40%">
            "Jelajahi pengalaman percakapan yang menyenangkan dengan menggunakan
            web chat kami. Mari bergabung dan nikmati kemudahan berkomunikasi
            secara real-time!"
          </p>
        </div>
      </div>
    </div>
    
    
    <!--FOOTER-->
    <div class="container" style="margin-top: 50px">
      <hr width="100%;" color="grey" size="5" />
      <p style="text-align: center">Kelompok 2 Pemweb SI-E 2024</p>
    </div>

<div class="container chat-container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">
          Chat Room
        </div>
        <div class="card-body">
          <textarea id="chat" class="form-control mb-3" rows="20" readonly></textarea>
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="username">
            </div>
            <label for="message" class="col-sm-2 col-form-label">Message:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="message">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const chat = document.querySelector("#chat");
  const message = document.querySelector("#message");
  const username = document.querySelector("#username");

  function readChat() {
    fetch("read")
      .then((res) => res.text())
      .then((data) => {
        chat.value = data;
      });
    setTimeout(readChat, 1000);
  }
  readChat();

  message.addEventListener("keyup", (e) => {
    if (e.keyCode === 13) {
      fetch("submit", {
        method: "post",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `username=${encodeURIComponent(username.value)}&message=${encodeURIComponent(message.value)}`,
      });
      message.value = "";
    }
  });
</script>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
