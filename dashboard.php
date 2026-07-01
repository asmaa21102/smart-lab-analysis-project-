<?php
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$currentUserId = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="das.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                    <img src="images/logo2.jpg" alt="profile">
                </div>
                <h2>ATL</h2>
            </li>

            <li>
                <a class="active" href="dashboard.php">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p class="C">Upload</p>
                </a>
            </li>

            <li>
                <a href="history.php">
                    <i class="fas fa-copy"></i>
                    <p class="C">History</p>
                </a>
            </li>

           

            <li class="log-out">
                <a href="login.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <p class="C">Log out</p>
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="title-info">
            <p>ATL Smart Lab Analysis</p>
            <i class="fas fa-brain"></i>
        </div>

        <div class="data-info">
            <div class="hero-card">
                <div class="hero-text">
                    <span class="hero-badge">AI Medical Dashboard</span>
                    <h1>Smart Blood Test Analysis</h1>
                    <p>
                        Upload your laboratory report and receive a clear AI-based
                        explanation for your blood test results in a modern and
                        professional medical dashboard.
                    </p>

                    <div class="hero-icons">
                        <span><i class="fas fa-vial"></i> Blood Tests</span>
                        <span><i class="fas fa-microscope"></i> Lab Analysis</span>
                        <span><i class="fas fa-heartbeat"></i> Health Insights</span>
                    </div>
                </div>

                <div class="hero-image">
                    <img src="images/nutritionist.png" alt="Medical Lab">
                </div>
            </div>

            <div class="hello-tabs-row">
                <div class="hello-box">
                    <div class="hello-animation">
                        <span>H</span>
                        <span>E</span>
                        <span>L</span>
                        <span>L</span>
                        <span>O</span>
                        <span class="space"></span>
                        <span>T</span>
                        <span>O</span>
                        <span class="space"></span>
                        <span>A</span>
                        <span>T</span>
                        <span>L</span>
                    </div>
                </div>

                <div id="tabs">
                    <menu>
                        <button id="btn-why-react" class="active">Upload & Analyze</button>
                        <button id="btn-core-features">Goals</button>
                        <button id="btn-resources">Motivation</button>
                    </menu>

                    <div id="tab-content">
                        <p>
                            Upload your PDF lab report and let the system extract,
                            analyze, and present your health indicators in a clear,
                            elegant, and easy-to-read format.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="upload-section">
            <div class="upload-decor">
                <i class="fas fa-heartbeat"></i>
                <i class="fas fa-notes-medical"></i>
                <i class="fas fa-flask"></i>
            </div>

            <img src="https://cdn-icons-png.flaticon.com/512/3209/3209265.png" class="upload-medical-image" alt="Lab report">

            <h2>Upload your Lab Report</h2>
            <p class="upload-subtitle">
                Select or drop PDF of your lab test results for AI analysis.
            </p>

            <div class="upload-box">
                <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
                <p class="a">Drag & drop your PDF file here</p>
                <input type="file" id="pdfFile" accept="application/pdf">
                <p class="upload-info">
                    PDF Max size: 5MB • Supported Formats: PDF
                </p>
            </div>

            <button id="extractBtn">Extract</button>
        </div>

        <div class="results-container">
            <div class="empty-state" id="emptyState">
                <i class="fas fa-flask"></i>
                <h3>Ready for Analysis</h3>
                <p>
                    Upload your lab report and click Extract to view your analysis results here.
                </p>
            </div>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="result-slide placeholder-slide">
                            <div class="result-badge">RESULTS</div>
                            <h2 class="result-title">Blood Test Preview</h2>
                            <h1 class="result-value">--</h1>
                            <p class="result-message">
                                Your extracted analysis cards will appear here after upload.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            
            <!-- AI Anemia Result -->
            <div id="anemiaResultContainer" style="display: none; margin-top: 30px; text-align: center; animation: fadeIn 0.5s ease-out;">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="das.js"></script>
    <script>
        window.mySwiperInstance = new Swiper(".mySwiper", {
navigation: {
nextEl: ".swiper-button-next",
prevEl: ".swiper-button-prev"
},
pagination: {
el: ".swiper-pagination",
clickable: true
}
});

document.getElementById("extractBtn").addEventListener("click", async () => {
const fileInput = document.getElementById("pdfFile");

if (!fileInput.files.length) {
    alert("PLEASE SELECT A FILE FIRST 📄");
    return;
}

const formData = new FormData();
formData.append("pdf", fileInput.files[0]);

const btn = document.getElementById("extractBtn");
btn.innerText = "Processing...";
btn.disabled = true;

try {
    const res = await fetch("http://localhost:3000/upload", {
        method: "POST",
        body: formData
    });

    const text = await res.text();

    if (!text || !text.trim()) {
        throw new Error("server is empty");
    }

    let data;
    try {
        data = JSON.parse(text);
    } catch (parseError) {
        console.error("Server returned invalid JSON:", text);
        throw new Error("wrong data");
    }

    console.log("Results from Server:", data);

    
    alert("AI Result: " + data.anemia_prediction);

    if (data.error) {
        alert(data.error);
        return;
    }

    const fileNameToSave = data.saved_file ? data.saved_file : fileInput.files[0].name;

    const saveResponse = await fetch("save_analysis.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: new URLSearchParams({
            file_name: fileNameToSave,
            result_status: data.result_status || "normal"
        })
    });

    const saveText = await saveResponse.text();
    let saveData;

    try {
        saveData = JSON.parse(saveText);
    } catch (e) {
        console.error("Save analysis returned invalid JSON:", saveText);
        throw new Error("save analysis error");
    }

    if (!saveData.success) {
        alert("FAILED TO  SAVE IN DATABASE" + saveData.message);
        return;
    }

    const swiperWrapper = document.querySelector(".results-container .mySwiper .swiper-wrapper");
    const emptyState = document.getElementById("emptyState");

    if (data.results && data.results.length > 0) {
        emptyState.style.display = "none";
        swiperWrapper.innerHTML = "";

        data.results.forEach(item => {
            let bgStyle = `
                linear-gradient(135deg, rgba(34, 197, 94, 0.78), rgba(21, 128, 61, 0.72)),
                radial-gradient(circle at top left, rgba(255,255,255,0.20), transparent 30%),
                radial-gradient(circle at bottom right, rgba(255,255,255,0.10), transparent 35%)
            `;
            let statusLabel = "HEALTHY";
            let textColor = "#ffffff";
            let descBg = "rgba(255,255,255,0.14)";
            let badgeBg = "rgba(255,255,255,0.24)";

            if (item.status === "red") {
                bgStyle = `
                    linear-gradient(135deg, rgba(239, 68, 68, 0.80), rgba(153, 27, 27, 0.74)),
                    radial-gradient(circle at top left, rgba(255,255,255,0.18), transparent 30%),
                    radial-gradient(circle at bottom right, rgba(255,255,255,0.10), transparent 35%)
                `;
                statusLabel = "ACTION REQUIRED";
            } else if (item.status === "yellow") {
                bgStyle = `
                    linear-gradient(135deg, rgba(250, 204, 21, 0.88), rgba(202, 138, 4, 0.82)),
                    radial-gradient(circle at top left, rgba(255,255,255,0.22), transparent 30%),
                    radial-gradient(circle at bottom right, rgba(255,255,255,0.10), transparent 35%)
                `;
                statusLabel = "BORDERLINE";
                textColor = "#263238";
                descBg = "rgba(255,255,255,0.42)";
                badgeBg = "rgba(255,255,255,0.58)";
            }

            const slideHTML = `
                <div class="swiper-slide">
                    <div class="result-slide fancy-card" style="background:${bgStyle}; color:${textColor};">
                        <img src="images/donor.png" class="card-top-img left-img">
                        <img src="images/advice.png" class="card-top-img right-img">

                        <div class="result-badge" style="background:${badgeBg}; color:${textColor};">
                            ${item.statusText || statusLabel}
                        </div>

                        <h2 class="result-title">${item.test || "Unknown Test"}</h2>
                        <h1 class="result-value">${item.value || "-"}</h1>

                        <p class="result-message" style="background:${descBg};">
                            ${item.message || "No message available"}
                        </p>
                    </div>
                </div>
            `;

            swiperWrapper.insertAdjacentHTML("beforeend", slideHTML);
        });

        if (window.mySwiperInstance) {
            window.mySwiperInstance.destroy(true, true);
        }

        window.mySwiperInstance = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            }
        });

        const anemiaContainer = document.getElementById("anemiaResultContainer");
        if (data.anemia_prediction) {
            const isAnemia = data.anemia_prediction.trim().toUpperCase() === "ANEMIA";
            const bgColor = isAnemia ? "#ff4757" : "#2ed573";
            const icon = isAnemia ? "fa-exclamation-triangle" : "fa-check-circle";

           anemiaContainer.innerHTML = `
<div style="
    margin: 30px auto;
    padding: 30px;
    border-radius: 20px;
    text-align: center;
    background: linear-gradient(135deg, #ffffff, #f1f2f6);
    max-width: 700px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    position: relative;
    overflow: hidden;
">

   
    <img src="blood-analysis.png"
        style="position:absolute; left:10px; top:50%; transform:translateY(-50%); width:80px; opacity:0.8;">

    
    <img src="doctor-visit.png"
        style="position:absolute; right:10px; top:90%; transform:translateY(-50%); width:80px; opacity:0.8;">

    <h2 style="color:#2f3640; margin-bottom:20px;">
        <i class="fas fa-brain" style="color:#8c7ae6;"></i>
        AI Anemia Diagnosis
    </h2>

    <div style="
        display:inline-block;
        padding:15px 40px;
        border-radius:15px;
        background:${bgColor};
        color:white;
        font-size:1.6rem;
        font-weight:bold;
        margin-bottom:20px;
        box-shadow:0 5px 15px ${bgColor}88;
    ">
        <i class="fas ${icon}"></i>
        ${data.anemia_prediction}
    </div>

    <div style="
        margin-top:15px;
        padding:20px;
        border-radius:15px;
        background:rgba(255,255,255,0.7);
        font-size:1rem;
        line-height:1.6;
        color:#2f3640;
    ">
        ${
            isAnemia
            ? `
            ⚠️ You may have signs of anemia. It is strongly recommended to visit a doctor for proper diagnosis.<br><br>
            <img src="risk.png"
        style="position:absolute;  width:80px; opacity:0.1;">

             Tips:
            <br> Eat iron-rich foods (spinach, meat, lentils)
            <br> Take Vitamin C to improve absorption
            <br> Avoid tea/coffee after meals
            `
            : `
             Your results look good. No signs of anemia detected.<br><br>
             Keep it up:
            <br> Maintain a balanced diet
            <br>Stay hydrated
            <br> Do regular checkups
            `
        }
    </div>

</div>
`;
            anemiaContainer.style.display = "block";
        } else {
            anemiaContainer.style.display = "none";
        }
    }

    alert("THE FILE SAVED IN History ");

} catch (err) {
    console.error("Error:", err);
    alert("connecting problem");
} finally {
    btn.innerText = "Extract";
    btn.disabled = false;
}

});
    </script>
</body>
</html>