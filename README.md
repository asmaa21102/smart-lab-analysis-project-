[ATL_POSTER_FIXED_SIZES.html](https://github.com/user-attachments/files/29550947/ATL_POSTER_FIXED_SIZES.html)

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ATL Smart Lab Analysis Poster - Ready for A2 Printing</title>
  <style>
    *{box-sizing:border-box;margin:0;padding:0;font-family:'Montserrat', sans-serif; }
    
    body{
      background:linear-gradient(135deg,#b9dcf5,#dcefff,#c8e7ff);
      padding:40px 20px;
      font-size:medium;
      font-weight: 700;
    }
    
    .poster{
      width:900px;
      min-height:1272px;
      margin:auto;
      background:linear-gradient(180deg,#d9f3ff,#c4e8fb);
      border-radius:12px;
      overflow:hidden;
      box-shadow:0 12px 35px rgba(0,0,0,.2);
    }
    
    .header{background:linear-gradient(135deg,#17245a,#275d94);color:white;display:grid;grid-template-columns:135px 1fr 165px;align-items:center;padding:24px 28px;gap:20px;}
    .logo{width:110px;height:110px;background:white;border-radius:24px;overflow:hidden;display:flex;align-items:center;justify-content:center;box-shadow:0 7px 16px rgba(0,0,0,.18);}
    .logo img{width:100%;height:100%;object-fit:cover;display:block;}
    
    .title-box{text-align:center;}
    .title-box h1{font-size:25px;line-height:1.15;margin-bottom:6px;font-weight:900;letter-spacing:.3px;}
    .title-box h2{font-size:15px;font-weight:700;letter-spacing:.4px;margin-bottom:8px;opacity: 0.95;}
    .title-box p{font-size:14px;opacity:.85; font-weight: 500;}
    
    .group{text-align:center;font-size:14px;letter-spacing:1px;background:rgba(255,255,255,.15);border-radius:16px;padding:14px 10px;}
    .group strong{display:block;font-size:28px;margin-top:6px;letter-spacing:0;font-weight: 900;}
    
    .section-grid{display:grid;grid-template-columns:1fr 1.15fr;gap:15px;padding:15px;}
    
    .card{background:rgba(255,255,255,.98);border-radius:16px;padding:18px;box-shadow:0 4px 15px rgba(20,75,120,.08);border:1px solid rgba(80,150,200,.15);height: 100%;}
    .card h3{font-size:22px;font-weight:900;margin-bottom:12px;text-transform:uppercase;color:#153c69;border-left:6px solid #58aee7;padding-left:10px;}
    .card p, .card li{font-size:13.5px;line-height:1.6;color:#10273d;font-weight:600;}
    
    .problem-layout{display:grid;grid-template-columns:160px 15px 1fr;align-items:center;gap:12px;margin-top:15px;}
    .pill{background:#e8f4ff;border-radius:8px;padding:10px;margin-bottom:8px;text-align:center;font-size:13px;font-weight:bold;color:#153c69;border:1px solid #cbe6fb;}
    .bracket{height:140px;border-left:8px solid #aacfe8;border-radius:50%;}
    .big-text{color:#005c93;font-size:22px;font-weight:900;line-height:1.4;text-align:center;}
    
    .methodology {margin: 0 15px 15px 15px;}
    
    .methodology-wrapper {
      display: grid;
      grid-template-columns: 7fr 7fr;
      gap: 15px;
      align-items: center;
      margin-top: 15px;
    }
    .flowchart-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
      width: 100%;
    }
    .flow-node {
      background: linear-gradient(135deg, #ffffff, #f4fafe);
      border: 2px solid #3b82f6;
      border-radius: 10px;
      padding: 8px 12px;
      width: 100%;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.04);
    }
    .flow-node strong {
      display: block;
      font-size: 20px;
      color: #0f4c81;
      margin-bottom: 3px;
      text-transform: uppercase;
    }
    .flow-node p {
      font-size: 20px;
      color: #2c3e50;
      font-weight: 600;
      line-height: 1.35;
    }
    .flow-node.input { border-color: #10b981; background: linear-gradient(135deg, #ffffff, #f0fdf4); }
    .flow-node.input strong { color: #10b981; }
    
    .flow-node.ai { border-color: #8b5cf6; background: linear-gradient(135deg, #ffffff, #f5f3ff); }
    .flow-node.ai strong { color: #8b5cf6; }

    .flow-node.output { border-color: #f97316; background: linear-gradient(135deg, #ffffff, #fff7ed); }
    .flow-node.output strong { color: #f97316; }

    .flow-arrow {
      font-size: 14px;
      color: #3b82f6;
      font-weight: bold;
      line-height: 1;
    }

    .blue-title{background:linear-gradient(90deg,#28699e,#58ace1);color:white;font-weight:900;padding:10px 15px;font-size:18px;margin:8px 0;text-transform: uppercase; letter-spacing: 0.5px;}
    .outcome{display:grid;grid-template-columns:1.55fr .95fr;gap:15px;padding:0 15px 15px;align-items:start;}
    
    .diagram-placeholder {
      border:3px solid #4d94c8;
      border-radius:22px;
      background:linear-gradient(135deg,#f8fcff,#edf7ff);
      height:170px;
      width:100%;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:10px;
      overflow:hidden;
      box-shadow:0 6px 18px rgba(0,0,0,.06);
    }
    .diagram-placeholder img { width:100%; height:100%; object-fit:contain; border-radius:12px; }

    .website-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:12px;}
    .screen-placeholder{
      height:165px;
      overflow:hidden;
      padding:6px;
      background:#eef8ff;
      border:2px solid #4d94c8;
      border-radius:18px;
      display:flex;
      align-items:center;
      justify-content:center;
    }
    .screen-placeholder img{width:100%;height:100%;object-fit:contain;display:block;border-radius:12px;}
    
    .site-box{margin-top:10px;padding:12px;border-radius:14px;background:#fff;box-shadow:0 4px 12px rgba(0,0,0,0.04);border-left:6px solid #ccc;}
    .site-title{font-size:13px;font-weight:900;margin-bottom:6px;color:#0f4c81;}
    .site-text{font-size:11px;line-height:1.5;font-weight:600;color:#2c3e50;}
    .site-box.blue{ border-left-color:#3b82f6; background:linear-gradient(135deg,#f5faff,#ffffff); }
    .site-box.green{ border-left-color:#10b981; background:linear-gradient(135deg,#f3fff7,#ffffff); }
    .site-box.purple{ border-left-color:#8b5cf6; background:linear-gradient(135deg,#f8f5ff,#ffffff); }
    .site-box.red{ border-left-color:#ef4444; background:linear-gradient(135deg,#fff5f5,#ffffff); }

    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700;900&family=Montserrat:wght@500;600;700;900&display=swap');
    
  
    @media print {
      body {
        padding: 0;
        background: none;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
      }
      .poster {
        width: 100%;
        height: 100%;
        box-shadow: none;
        border-radius: 0;
        page-break-inside: avoid;
      }
    }
  </style>
</head>
<body>
  <div class="poster">
  <header class="header">

  <div style="display:flex; align-items:center; gap:18px;">
    
    <div class="logo" >
      <img src="logo.png" alt="QR Code" style=" min-width:85px; height:85px; display:block;">
    </div>

    

  </div>

  <div class="title-box">
    <h1>KARABÜK ÜNİVERSİTESİ</h1>
<h1> EĞİTİM ÖĞRETİM YILI BAHAR DÖNEMİ BİTİRME PROJESİ</h1>
<h1>BİLGİSAYAR VE BİLİŞİM BİLİMLERİ FAKÜLTESİ
    <h1>ATL SMART LAB ANALYSIS PROJECT</h1>
    <h2>ASMAA A. A. AQEL, TESNIM ELKEMAHLİ, LAYL YOUSİF</h2>
    <p>Supervisor: Prof. Ammar Alqadasi</p>
  </div>

  <div class="group">GROUP<strong>29898</strong></div>

</header>
    <div class="section-grid">
      <section class="card">
        <h3>Background</h3>

        <p>
          ATL Smart Lab Analysis is a web-based medical system that analyzes laboratory PDF reports and transforms complex blood test data into clear medical insights.
        </p>
        <p style="margin-top:10px;">
          The project was strengthened by adding an <strong>Artificial Intelligence prediction layer</strong>. After extracting the medical values, the system uses a <strong>Random Forest machine learning model</strong> to predict whether the patient may have anemia or not.
        </p>
        <div class="problem-layout">
          <div>
            <div class="pill">Complex lab reports</div>
            <div class="pill">Manual result understanding</div>
            <div class="pill">Need for early anemia detection</div>
          </div>
          <div class="bracket"></div>
          <div class="big-text">AI-Powered<br>Anemia Risk<br>Prediction</div>
        </div>
      </section>

      <section class="card">
        <h3>Objectives & Motivation</h3>
        <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:11px;">
          <li style="background:#eaf6ff; padding:10px 12px; border-radius:10px;">➢ Make laboratory reports easier to understand for non-specialist users.</li>
          <li style="background:#f0f9ff; padding:10px 12px; border-radius:10px;">➢ Automatically extract key medical values from PDF lab reports.</li>
          <li style="background:#eaf6ff; padding:10px 12px; border-radius:10px;">➢ Classify results based on medical reference ranges and provide clear explanations.</li>
          <li style="background:#f0f9ff; padding:10px 12px; border-radius:10px;">➢ Provide a modern and interactive health dashboard for users.</li>
          <li style="background:#eaf6ff; padding:10px 12px; border-radius:10px;">➢ Store and track previous medical analyses for health history.</li>
          <li style="background:#f0f9ff; padding:10px 12px; border-radius:10px;">➢ Integrate AI (Random Forest) to predict anemia risk.</li>
          <li style="background:#eaf6ff; padding:10px 12px; border-radius:10px;">➢ Deliver clear and simple explanations of medical results.</li>
        </ul>
      </section>
    </div>

    <section class="card methodology">
      <h3>Methodology</h3>
      <div class="methodology-wrapper">
        
        <div style="background:linear-gradient(135deg,#f8fcff,#edf7ff); border-radius:20px; padding:10px; border:2.5px solid #4d94c8; box-shadow:0 4px 15px rgba(0,0,0,.05); display: flex; align-items: center; justify-content: center; height: 100%; max-width: fit-content;">
          <img src="lab.jpeg" alt="Methodology Design" style="width:100%; max-height:460px; object-fit:contain; border-radius:14px; display:block;">
        </div>

        <div class="flowchart-container">
          <div class="flow-node input">
            <strong>Step 1: Upload & OCR</strong>
            <p>PDF reports are uploaded and text is extracted using OCR and Python processing.</p>
          </div>
          
          <div class="flow-arrow">⬇</div>
          
          <div class="flow-node">
            <strong>Step 2: Analysis</strong>
            <p>Each extracted value is compared individually with standard medical reference ranges</p>
          </div>
          
          <div class="flow-arrow">⬇</div>
          
          <div class="flow-node ai">
            <strong>Step 3: AI Prediction</strong>
            <p>A trained Random Forest model evaluates the data to predict anemia risk.</p>
          </div>
          
          <div class="flow-arrow">⬇</div>
          
          <div class="flow-node output">
            <strong>Step 4: Output</strong>
            <p>Each laboratory value is explained one by one in simple language. If a value is high or low, the system shows what it means and the possible medical reasons, along with an overall clear and user-friendly result</p>
          </div>
        </div>

      </div>
    </section>

    <div class="blue-title">Project Outcome</div>

    <div class="outcome">
      <div>
        <section class="card">
          <h3>System Design</h3>
          <p>
            This flowchart shows the system process from uploading a lab PDF, extracting and analyzing medical values using Python and AI, to predicting anemia risk and displaying clear results in a user-friendly dashboard.
          </p>
         
          <div style="margin-top:15px;">
            <div class="diagram-placeholder">
              <img src="Lab Report PDF Extraction-2026-05-12-100616.png" alt="Flowchart">
            </div>
          </div>
        </section>

        <section class="card" style="margin-top:12px;">
          <h3>Website Design</h3>
          <div class="website-grid">
            <div>
              <div class="screen-placeholder"><img src="login-page.png" alt="Login Page"></div>
              <div class="site-box blue">
                <div class="site-title">Login Screen</div>
                <div class="site-text">Secure access using username/email with password authentication.</div>
              </div>
            </div>
            <div>
              <div class="screen-placeholder"><img src="dashboard-page.png" alt="Dashboard"></div>
              <div class="site-box green">
                <div class="site-title">Smart Dashboard</div>
                <div class="site-text">Upload reports and view analysis cards, interpretations, and AI predictions.</div>
              </div>
            </div>
            <div>
              <div class="screen-placeholder"><img src="history-page.png" alt="History"></div>
              <div class="site-box purple">
                <div class="site-title">Analysis History</div>
                <div class="site-text">Track previous reports with status logs and download utilities.</div>
              </div>
            </div>
            <div>
              <div class="screen-placeholder"><img src="ai-result-page.png" alt="AI Diagnosis"></div>
              <div class="site-box red">
                <div class="site-title">AI Prediction Result</div>
                <div class="site-text">Displays the final anemia prediction using the Random Forest model.</div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <div>
        <section class="card" style="margin-top:0px;">
          <h3>Key Features</h3>
          <div style="display:flex; flex-direction:column; gap:12px; margin-top:8px;">
            <div style="background:linear-gradient(90deg,#eef8ff,#ffffff); border-left:6px solid #2c7fb8; border-radius:14px; padding:14px; box-shadow:0 3px 8px rgba(0,0,0,.05);">
              <div style="font-size:20px;font-weight:900;color:#0f4c81;">100%</div>
              <div style="font-size:12px;line-height:1.7;color:#234;">PDF uploads parsed flawlessly via <strong>pdfplumber</strong>.</div>
            </div>
            <div style="background:linear-gradient(90deg,#eef8ff,#ffffff); border-left:6px solid #58ace1; border-radius:14px; padding:14px; box-shadow:0 3px 8px rgba(0,0,0,.05);">
              <div style="font-size:20px;font-weight:900;color:#0f4c81;">95%</div>
              <div style="font-size:12px;line-height:1.7;color:#234;">Scanned images managed smoothly using <strong>pytesseract OCR</strong>.</div>
            </div>
            <div style="background:linear-gradient(90deg,#eef8ff,#ffffff); border-left:6px solid #7c4dff; border-radius:14px; padding:14px; box-shadow:0 3px 8px rgba(0,0,0,.05);">
              <div style="font-size:20px;font-weight:900;color:#0f4c81;">98%</div>
              <div style="font-size:12px;line-height:1.7;color:#234;">Accuracy achieved by <strong>Random Forest Classifier</strong> in risk prediction.</div>
            </div>
            <div style="background:linear-gradient(90deg,#eef8ff,#ffffff); border-left:6px solid #ff7675; border-radius:14px; padding:14px; box-shadow:0 3px 8px rgba(0,0,0,.05);">
              <div style="font-size:20px;font-weight:900;color:#0f4c81;">100%</div>
              <div style="font-size:12px;line-height:1.7;color:#234;">Results classified using color-coded medical ranges for clear view.</div>
            </div>
          </div>
        </section>

        <section class="card" style="margin-top:12px;">
          <h3 style="text-align:center;color:#0f4c81;font-size:18px;font-weight:900;">AI ANEMIA PREDICTION MODULE</h3>
          <div style="margin-top:12px;display:grid;gap:12px;">
            <div style="background:linear-gradient(90deg,#eef8ff,#ffffff); border-left:6px solid #2c7fb8; border-radius:14px; padding:14px; text-align:center;">
              <strong style="font-size:15px;color:#0f4c81;">Input</strong>
              <span style="font-size:12px;color:#234;">Gender, Hemoglobin, MCH, MCHC, MCV values.</span>
            </div>
            <div style="background:linear-gradient(90deg,#eef8ff,#ffffff); border-left:6px solid #58ace1; border-radius:14px; padding:14px; text-align:center;">
              <strong style="font-size:15px;color:#0f4c81;">Processing</strong>
              <span style="font-size:12px;color:#234;">Features processed via Trained Random Forest.</span>
            </div>
            <div style="background:linear-gradient(90deg,#eef8ff,#ffffff); border-left:6px solid #ff7675; border-radius:14px; padding:14px; text-align:center;">
              <strong style="font-size:15px;color:#0f4c81;">Prediction</strong>
              <span style="font-size:12px;color:#234;">Classification into Anemia / Non-Anemia.</span>
            </div>
          </div>
          <img src="image.png" alt="AI Evaluation Chart" style="width:300px; height:auto; display:block; margin:auto; margin-top: 25px;">
        </section>
      </div>
    </div>
  </div>
</body>
</html>
