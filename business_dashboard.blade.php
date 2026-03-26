
<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titan M2 | Command Center 🌸</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.36.1/min/vs/loader.min.js"></script>
    
    <style>
        :root {
            --primary: #4ec9b0;
            --bg-dark: #050505;
            --panel: #111111;
            --header: #181818;
            --accent-orange: #ff9800;
            --accent-blue: #3498db;
            --accent-red: #ff5f56;
            --text-muted: #888888;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body, html { height: 100vh; background: var(--bg-dark); color: #e0e0e0; font-family: 'Consolas', monospace; overflow: hidden; display: flex; flex-direction: column; }

        .cool-header { height: 60px; background: var(--header); display: flex; align-items: center; justify-content: space-between; padding: 0 25px; border-bottom: 2px solid #000; box-shadow: 0 4px 20px rgba(0,0,0,0.5); z-index: 100; }
        .brand { display: flex; align-items: center; gap: 15px; font-weight: 900; letter-spacing: 2px; color: var(--primary); font-size: 18px; }

        .btn-push { background: var(--accent-orange); color: #000; border: none; padding: 10px 25px; border-radius: 6px; font-weight: 900; cursor: pointer; display: flex; align-items: center; gap: 10px; transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .btn-push:hover { background: #fff; box-shadow: 0 0 25px var(--accent-orange); transform: scale(1.05); }

        .workspace { flex: 1; display: flex; width: 100%; height: calc(100vh - 95px); }
        .pane-editor { flex: 1.8; display: flex; flex-direction: column; border-right: 2px solid #000; background: #1e1e1e; }
        .editor-top-bar { padding: 10px 15px; background: #252526; font-size: 11px; color: var(--text-muted); border-bottom: 1px solid #333; display: flex; justify-content: space-between; }

        .pane-terminal { flex: 1; background: var(--panel); display: flex; flex-direction: column; box-shadow: -10px 0 30px rgba(0,0,0,0.5); }
        .tab-switcher { display: flex; background: #000; border-bottom: 1px solid #222; }
        .tab-btn { flex: 1; padding: 14px; border: none; background: transparent; color: var(--text-muted); cursor: pointer; font-size: 11px; font-weight: bold; display: flex; align-items: center; justify-content: center; gap: 10px; transition: 0.3s; }
        .tab-btn.active { background: var(--panel); color: var(--primary); border-bottom: 3px solid var(--primary); }

        .view-content { flex: 1; overflow-y: auto; padding: 15px; display: none; background: #0c0c0c; }
        .view-content.active { display: block; }

        .log-line { margin-bottom: 8px; font-size: 12px; display: flex; gap: 12px; border-bottom: 1px solid rgba(255,255,255,0.03); padding-bottom: 6px; }
        .log-time { color: #555; font-size: 10px; min-width: 60px; }
        .log-tag { font-weight: bold; color: var(--primary); }
        .log-msg { color: #ccc; word-break: break-all; }
        .log-error { color: var(--accent-red); }

        .net-table { width: 100%; border-collapse: collapse; font-size: 11px; }
        .net-table th { text-align: left; padding: 10px; color: var(--text-muted); border-bottom: 1px solid #333; background: #000; position: sticky; top: 0; }
        .net-table td { padding: 10px; border-bottom: 1px solid #1a1a1a; }
        .status-ok { color: #00ff88; font-weight: bold; }

        .cool-footer { height: 35px; background: var(--accent-blue); display: flex; align-items: center; justify-content: space-between; padding: 0 25px; font-size: 11px; font-weight: 700; color: #fff; }
    </style>
</head>
<body>

<header class="cool-header">
    <div class="brand"><i class="fas fa-satellite-dish"></i> JS COMMAND CENTER <small style="font-size: 10px; opacity: 0.6; margin-left: 10px;">v3.0</small></div>
    <div style="display:flex; gap:20px; align-items:center;">
        <span id="connection-status" style="font-size:10px; color:var(--text-muted);"><i class="fas fa-circle"></i> STANDBY</span>
        <button class="btn-push" onclick="executeRemoteCode()"><i class="fas fa-bolt"></i> PUSH TO MONITOR-3</button>
    </div>
</header>

<main class="workspace">
    <div class="pane-editor">
        <div class="editor-top-bar">
            <span><i class="fab fa-js-square" style="color:#f7df1e"></i> scripts/master_control.js</span>
            <span>UTF-8 | JavaScript</span>
        </div>
        <div id="monaco-editor-host" style="height:100%"></div>
    </div>

    <div class="pane-terminal" style="background: #1e1e1e; border: 1px solid #333; border-radius: 8px; overflow: hidden; font-family: 'Segoe UI', sans-serif; box-shadow: 0 10px 30px rgba(0,0,0,0.5); color: #d4d4d4;">
    
    <div class="tab-switcher" style="background: #252526; display: flex; border-bottom: 1px solid #333;">
        <button class="tab-btn active" id="btn-console" onclick="switchTab('console', this)" style="background: #1e1e1e; border: none; color: #3498db; padding: 10px 18px; cursor: pointer; font-size: 11px; font-weight: bold; border-right: 1px solid #333; border-bottom: 2px solid #3498db; outline: none;">
            <i class="fas fa-terminal" style="margin-right: 6px;"></i> CONSOLE
        </button>
        <button class="tab-btn" id="btn-network" onclick="switchTab('network', this)" style="background: transparent; border: none; color: #888; padding: 10px 18px; cursor: pointer; font-size: 11px; font-weight: bold; border-right: 1px solid #333; outline: none;">
            <i class="fas fa-network-wired" style="margin-right: 6px;"></i> NETWORK
        </button>
        <button class="tab-btn" id="btn-events" onclick="switchTab('events', this)" style="background: transparent; border: none; color: #888; padding: 10px 18px; cursor: pointer; font-size: 11px; font-weight: bold; border-right: 1px solid #333; outline: none;">
            <i class="fas fa-bolt" style="margin-right: 6px;"></i> EVENTS
        </button>
    </div>

    <div id="view-console" class="view-content" style="display: block; height: 350px; overflow-y: auto;">
        <div id="console-logs" style="padding: 2px;"></div>
    </div>

    <div id="view-network" class="view-content" style="display: none; height: 350px;">
        <div style="display: flex; height: 100%;">
            <div style="width: 40%; border-right: 1px solid #333; overflow-y: auto; background: #242424;">
                <table style="width: 100%; border-collapse: collapse; font-size: 11px; text-align: left;">
                    <thead style="position: sticky; top: 0; background: #333; color: #aaa; z-index: 5;">
                        <tr><th style="padding: 8px 10px; border-bottom: 1px solid #444;">Name</th></tr>
                    </thead>
                    <tbody id="network-logs-list"></tbody>
                </table>
            </div>
            <div id="network-details-panel" style="width: 60%; background: #1e1e1e; display: none; flex-direction: column;">
                <div style="background: #2d2d2d; display: flex; gap: 15px; padding: 0 10px; border-bottom: 1px solid #333; height: 30px; align-items: center;">
                    <span class="net-sub-tab active" onclick="showNetDetail('headers', this)" style="color: #3498db; border-bottom: 2px solid #3498db; cursor: pointer; font-size: 11px; padding: 5px 0;">Headers</span>
                    <span class="net-sub-tab" onclick="showNetDetail('preview', this)" style="color: #888; cursor: pointer; font-size: 11px; padding: 5px 0;">Preview</span>
                    <span class="net-sub-tab" onclick="showNetDetail('response', this)" style="color: #888; cursor: pointer; font-size: 11px; padding: 5px 0;">Response</span>
                </div>
                <div id="net-detail-content" style="flex-grow: 1; padding: 10px; overflow-y: auto; font-size: 11px;"></div>
            </div>
        </div>
    </div>

    <div id="view-events" class="view-content" style="display: none; height: 350px;">
        <div style="display: flex; height: 100%;">
            <div style="width: 40%; border-right: 1px solid #333; overflow-y: auto; background: #242424;">
                <table style="width: 100%; border-collapse: collapse; font-size: 11px; text-align: left;">
                    <thead style="position: sticky; top: 0; background: #333; color: #aaa; z-index: 5;">
                        <tr><th style="padding: 8px 10px; border-bottom: 1px solid #444;">Event Type</th></tr>
                    </thead>
                    <tbody id="event-logs-list">
                        </tbody>
                </table>
            </div>
            <div id="event-details-panel" style="width: 60%; background: #1e1e1e; display: flex; flex-direction: column;">
                <div style="background: #2d2d2d; display: flex; padding: 0 15px; border-bottom: 1px solid #333; height: 30px; align-items: center;">
                    <span style="color: #3498db; border-bottom: 2px solid #3498db; cursor: pointer; font-size: 11px; padding: 5px 0; font-weight: bold;">Event Detail Info</span>
                </div>
                <div id="event-detail-content" style="flex-grow: 1; padding: 15px; overflow-y: auto; font-size: 11px; color: #aaa;">
                    महेंद्र सिंह जी, सेलेक्टर चुनने के बाद इवेंट्स यहाँ चमकेंगे... ✨
                </div>
            </div>
        </div>
    </div>
    
    <div style="padding: 6px 15px; border-top: 1px solid #222; background: #000; display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 9px; color: #555; font-weight: bold;">
            <i class="fas fa-circle" style="color: #27ae60; font-size: 7px; margin-right: 5px;"></i> LIVE UPDATES ENABLED
        </div>
        <i class="fas fa-trash-alt" style="cursor: pointer; font-size: 11px; color: #666;" onclick="clearLogs()"></i>
    </div>
</div></main>

<footer class="cool-footer">
    <div><i class="fas fa-user-circle"></i> Mahendar Singh | Green Shop Studio</div>
    <div id="cursor-pos">Ln 13, Col 1</div>
</footer>

<script>

/* =========================================================
   🌸 राधिका: M2 (JS Editor) 'Browser Inspector' Receiver ✨
   महेंद्र सिंह जी, यह वैल्यू को सीधा Browser Console (F12) में दिखाएगा!
   ========================================================= */

/* =========================================================
   🌸 राधिका: Monitor-2 'Inspector' Receiver ✨
   महेंद्र सिंह जी, यह M1 Hub के संदेशों को पकड़कर F12 कंसोल में दिखाएगा।
   ========================================================= */

/* =========================================================
   🌸 राधिका: कनवर्टेड 'Satik' रिसीवर ✨
   महेंद्र सिंह जी, यह कोड ID, Class और Tag तीनों को हैंडल करेगा!
   ========================================================= */
/* =========================================================
   🌸 राधिका: फाइनल 'Satik' रिसीवर ✨
   महेंद्र सिंह जी, यह कोड 3 अलग-अलग मैच काउंट करेगा!
   ========================================================= */
window.addEventListener('message', (event) => {
    if (event.origin !== "https://greenshop.org.in") return;

    let incoming = event.data;
    const currentEditor = window.titanEditor;

    if (currentEditor) {
        const model = currentEditor.getModel();
        
        // 🔍 महेंद्र सिंह जी, तीनों के लिए अलग-अलग 'Satik' मैच काउंट
        const tCount = incoming.tag ? model.findMatches(incoming.tag.toLowerCase()).length : 0;
        const cCount = (incoming.callss && incoming.callss !== "null") ? model.findMatches(`.${incoming.callss.split(' ')[0]}`).length : 0;
        const iCount = (incoming.id && incoming.id !== "no-id" && incoming.id !== "null") ? model.findMatches(`#${incoming.id}`).length : 0;

        // 🎯 मुख्य सेलेक्टर तय करना (एडिटर में Jump के लिए)
        let mainSelector = "";
        if (incoming.id && incoming.id !== "no-id") mainSelector = `#${incoming.id}`;
        else if (incoming.callss && incoming.callss !== "null") mainSelector = `.${incoming.callss.split(' ')[0]}`;
        else mainSelector = incoming.tag.toLowerCase();

        // 🚀 एडिटर में Jump करना
        const mainMatches = model.findMatches(mainSelector);
        if (mainMatches.length > 0) {
            const targetRange = mainMatches[0].range;
            currentEditor.revealRangeInCenter(targetRange);
            currentEditor.setSelection(targetRange);
            currentEditor.focus();
        }

        // 📋 EVENTS टेबल को अपडेट करना
        const eventTable = document.getElementById('event-logs-list');
        if (eventTable) {
            const existingRow = eventTable.querySelector(`[data-id="${mainSelector}"]`);
            if (existingRow) existingRow.remove();

            const newRow = document.createElement('tr');
            newRow.setAttribute('data-id', mainSelector); 
            newRow.style.cursor = "pointer";
            newRow.style.borderBottom = "1px solid #333";
            
            newRow.onclick = () => {
                updateEventDetail(incoming.callss, incoming.id, incoming.perent, tCount, cCount, iCount, incoming.tag);
            };

            newRow.innerHTML = `
                <td style="padding: 8px 10px; color: #2ecc71;">
                    <i class="fas fa-search"></i> ${mainSelector}
                </td>
            `;
            eventTable.insertBefore(newRow, eventTable.firstChild);

            // ✨ तुरंत पैनल अपडेट करना (3 अलग मैचों के साथ)
            updateEventDetail(incoming.callss, incoming.id, incoming.perent, tCount, cCount, iCount, incoming.tag);
        }
    }
});
/* =========================================================
   🔍 महेंद्र सिंह जी, यह रहा आपका Ultra-Detailed पैनल 🌸
   इसमें Attributes और Total Matches भी शामिल हैं! ✨
   ========================================================= */
function updateEventDetail(cName, iName, parent, tMatch, cMatch, iMatch, tagName, attributes = {}, textContent = "") {
    const detailPanel = document.getElementById('event-detail-content');
    if (!detailPanel) return;
    
    // 🎯 कुल मैचों का हिसाब
    const totalMatches = tMatch + cMatch + iMatch;
    
    const displayClass = (cName && cName !== "null") ? `.${cName}` : "none";
    const displayId = (iName && iName !== "no-id" && iName !== "null") ? `#${iName}` : "none";
    const displayTag = tagName ? tagName.toLowerCase() : "unknown";

    detailPanel.innerHTML = `
        <div style="color: #fff; line-height: 1.6; font-family: 'Segoe UI', sans-serif;">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <b style="color: #2ecc71; font-size: 14px;">
                    <i class="fas fa-bullseye"></i> Target Detail
                </b>
                <span style="background: #e74c3c; color: #fff; padding: 2px 12px; border-radius: 20px; font-size: 10px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.5px;">
                    Total: ${totalMatches}
                </span>
            </div>

 <div style="margin-top: 15px;">
                <b style="color: #3498db; font-size: 12px; display: flex; align-items: center;">
                    <i class="fas fa-code" style="margin-right: 8px;"></i> CLASS LIST: 
                    <span style="color: #fff; font-family: monospace; margin-left: 12px; word-break: break-all;">${displayClass}</span>
                </b>
                <div style="background: rgba(255, 255, 255, 0.03); padding: 10px; border-radius: 8px; font-size: 11px; margin-top: 8px;">
                    <div style="margin-bottom: 6px; display: flex; align-items: center;">
                        <i class="fas fa-terminal" style="color: #3498db; width: 20px;"></i>
                        <span style="color: #abb2bf;">Methods Found:</span> 
                        <span style="color: #fff; font-weight: bold; margin-left: 8px;">${cMatch}</span>
                    </div>
                    <div style="margin-bottom: 6px; display: flex; align-items: center;">
                        <i class="fas fa-link" style="color: #9b59b6; width: 20px;"></i>
                        <span style="color: #abb2bf;">Variable Reference:</span> 
                        <span style="color: #2ecc71; font-weight: bold; margin-left: 8px;">${cName !== "null" ? cName + 'Ref' : '0'}</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <i class="fas fa-project-diagram" style="color: #9b59b6; width: 20px;"></i>
                        <span style="color: #abb2bf;">Related Elements:</span> 
                        <span style="color: #2ecc71; font-weight: bold; margin-left: 8px;">0</span>
                    </div>
                </div>
            </div>

            <div style="margin-top: 15px;">
                <b style="color: #e67e22; font-size: 12px; display: flex; align-items: center;">
                    <i class="fas fa-fingerprint" style="margin-right: 8px;"></i> UNIQUE ID: 
                    <span style="color: #fff; font-family: monospace; margin-left: 12px;">${displayId}</span>
                </b>
                <div style="background: rgba(255, 255, 255, 0.03); padding: 10px; border-radius: 8px; font-size: 11px; margin-top: 8px;">
                    <div style="margin-bottom: 6px; display: flex; align-items: center;">
                        <i class="fas fa-terminal" style="color: #e67e22; width: 20px;"></i>
                        <span style="color: #abb2bf;">Methods Found:</span> 
                        <span style="color: #fff; font-weight: bold; margin-left: 8px;">${iMatch}</span>
                    </div>
                    <div style="margin-bottom: 6px; display: flex; align-items: center;">
                        <i class="fas fa-link" style="color: #9b59b6; width: 20px;"></i>
                        <span style="color: #abb2bf;">Variable Reference:</span> 
                        <span style="color: #2ecc71; font-weight: bold; margin-left: 8px;">${iName !== "no-id" ? iName : '0'}</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <i class="fas fa-project-diagram" style="color: #9b59b6; width: 20px;"></i>
                        <span style="color: #abb2bf;">Related Elements:</span> 
                        <span style="color: #2ecc71; font-weight: bold; margin-left: 8px;">0</span>
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <b style="color: #9b59b6; font-size: 12px; display: block; margin-bottom: 8px;">
                    <i class="fas fa-sliders-h"></i> Properties & Text
                </b>
                <div style="background: rgba(255, 255, 255, 0.03); padding: 10px; border-radius: 8px; font-size: 12px;">
                    <div style="margin-bottom: 5px;">
                        <i class="fas fa-align-left" style="color: #9b59b6; width: 18px;"></i>
                        <span style="color: #abb2bf;">Content:</span> 
                        <span style="color: #fff; font-style: italic;">"${textContent || 'No text content'}"</span>
                    </div>
                    <div>
                        <i class="fas fa-eye" style="color: #34495e; width: 18px;"></i>
                        <span style="color: #abb2bf;">Visibility:</span> 
                        <span style="color: #2ecc71;">Visible</span>
                    </div>
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid #333; margin: 15px 0;">

            <b style="color: #f1c40f; font-size: 13px; display: block; margin-bottom: 8px;">
                <i class="fas fa-sitemap"></i> Parent Context
            </b>
            <div style="background: rgba(241, 196, 15, 0.05); padding: 8px; border-radius: 6px; font-size: 11px; border: 1px dashed rgba(241, 196, 15, 0.2);">
                <span style="color: #abb2bf;">ID:</span> <span style="color: #e67e22; font-family: monospace;">#${parent.id || 'none'}</span> | 
                <span style="color: #abb2bf;">Class:</span> <span style="color: #3498db; font-family: monospace;">.${parent.class || 'none'}</span>
            </div>
        </div>
        
        <div style="border-top: 1px solid #333; margin-top: 15px; padding-top: 8px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-size: 9px; color: #5c6370; text-transform: uppercase; letter-spacing: 1px;">Green Shop Assistant</span>
            <span style="font-size: 10px; color: #5c6370;">
                <i class="far fa-clock"></i> ${new Date().toLocaleTimeString()}
            </span>
        </div>
    `;
}



    let editor;
    const consoleContainer = document.getElementById('console-logs');
    const networkContainer = document.getElementById('network-logs');

    // 1. Monaco Editor Initialization
    require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.36.1/min/vs' }});
    require(['vs/editor/editor.main'], function() {
        editor = monaco.editor.create(document.getElementById('monaco-editor-host'), {
            value: "// नमस्ते महेंद्र सिंह जी! 🌸\n// अब आप यहाँ से सीधे Monitor-3 को कंट्रोल कर सकते हैं।\n\nconsole.log('Titan Link Established with M3! 🚀');",
            language: 'javascript',
            theme: 'vs-dark',
            automaticLayout: true,
            fontSize: 16,
            fontFamily: "'JetBrains Mono', 'Consolas', monospace",
            minimap: { enabled: false }
        });

        editor.onDidChangeCursorPosition(e => {
            document.getElementById('cursor-pos').innerText = `Ln ${e.position.lineNumber}, Col ${e.position.column}`;
        });

        window.titanEditor = editor;
    });

    // 2. 🔥 Bridge Logic: Monitor-1 के ज़रिए Monitor-3 को कोड भेजना
    function executeRemoteCode() {
    if (!window.titanEditor) return;
    const code = window.titanEditor.getValue();
    
    // 🌸 बटन को पहचानना ताकि हम उसे सजा सकें
    const pushBtn = document.querySelector(".btn-push");
    const originalHTML = pushBtn.innerHTML; // "PUSH TO MONITOR-3" को याद रखना

    try {
        if (window.opener) {
            // ✨ बटन को 'Active' दिखाना (एनीमेशन शुरू)
            pushBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> SENDING...';
            pushBtn.style.opacity = "0.8"; 
            pushBtn.style.pointerEvents = "none"; // डबल क्लिक से बचाने के लिए

            // 📡 आपका पुराना पक्का लॉजिक (Monitor-1 को भेजना)
            window.opener.postMessage({ 
                type: 'TEST_FROM_M2', 
                code: code 
            }, "*");

            addConsoleRow("System: Sending data to Monitor-1 Hub... 🚀"); 
            updateStatus("SENDING...", "#3498db");

            // ✅ सफलता का इशारा (0.8 सेकंड बाद बटन सामान्य हो जाएगा)
            setTimeout(() => {
                pushBtn.innerHTML = '<i class="fas fa-check-circle"></i> SENT! ✅';
                pushBtn.style.background = "#2ecc71"; // हरा रंग
                pushBtn.style.opacity = "1";

                // 🌸 1.5 सेकंड बाद बटन वापस अपने पुराने रूप में
                setTimeout(() => {
                    pushBtn.innerHTML = originalHTML;
                    pushBtn.style.background = ""; 
                    pushBtn.style.pointerEvents = "auto";
                }, 1500);
            }, 800);

        } else {
            // ⚠️ अगर हब नहीं मिला (पुराना एरर लॉजिक)
            pushBtn.innerHTML = '<i class="fas fa-times-circle"></i> HUB ERROR';
            pushBtn.style.background = "#ff5f56";
            addConsoleRow("Error: Monitor-1 (Main Hub) not found! ⚠️", true); 
            updateStatus("LINK ERROR", "#ff5f56"); 

            setTimeout(() => {
                pushBtn.innerHTML = originalHTML;
                pushBtn.style.background = "";
            }, 2000);
        }
    } catch (err) {
        addConsoleRow("Fatal Error: " + err.message, true); 
    }
}

    // 3. UI Helpers
    function addConsoleRow(msg, isError = false) {
        const time = new Date().toLocaleTimeString([], {hour12:false});
        const div = document.createElement('div');
        div.className = 'log-line';
        div.innerHTML = `
            <span class="log-time">[${time}]</span>
            <span class="log-tag">M3 >></span>
            <span class="log-msg ${isError ? 'log-error' : ''}">${msg}</span>
        `;
        consoleContainer.prepend(div);
    }

    function switchTab(viewId, btn) {
        document.querySelectorAll('.view-content').forEach(v => v.classList.remove('active'));
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.getElementById('view-' + viewId).classList.add('active');
        btn.classList.add('active');
    }

    function clearLogs() {
        consoleContainer.innerHTML = '';
        networkContainer.innerHTML = '';
    }

    function updateStatus(text, color) {
        const el = document.getElementById('connection-status');
        el.innerHTML = `<i class="fas fa-circle"></i> ${text}`;
        el.style.color = color;
    }
    
    // 🌸 महेंद्र सिंह जी, यह मॉनिटर-2 का 'कान' है जो हब की बातें सुनेगा
</script>
<script>/**
 * 🌸 राधिका: महेंद्र सिंह जी, यह आपके M2 की फाइनल स्क्रिप्ट है।
 * यह M1 (Hub) और M3 (Source) से आने वाले डेटा को सही टैब में दिखाएगी। ✨
 */

let currentNetworkData = null; 

// 🌳 1. JSON Tree Function (आपका सिग्नेचर लॉजिक)
function createJSONTree(data) {
    const folder = document.createElement('details');
    folder.style = "cursor: pointer; color: #f1c40f; margin-left: 10px; outline: none;";
    const summary = document.createElement('summary');
    summary.innerHTML = Array.isArray(data) ? `Array(${data.length})` : `Object { ... }`;
    summary.style = "color: #3498db; font-weight: bold; padding: 2px 0;";
    folder.appendChild(summary);
    const content = document.createElement('pre');
    content.style = "background: rgba(255,255,255,0.05); padding: 8px; margin: 5px 0; border-radius: 4px; color: #ecf0f1; font-size: 11px; overflow-x: auto; border: 1px solid #333;";
    content.textContent = JSON.stringify(data, null, 2);
    folder.appendChild(content);
    return folder;
}

// 📑 2. टैब स्विचिंग लॉजिक (M3 Console / M3 Network)
window.switchTab = function(tab, btn) {
    document.querySelectorAll('.view-content').forEach(v => v.style.display = 'none');
    document.querySelectorAll('.tab-btn').forEach(b => {
        b.style.background = 'transparent';
        b.style.color = '#888';
        b.style.borderBottom = 'none';
    });

    const targetView = document.getElementById('view-' + tab);
    if (targetView) targetView.style.display = 'block';

    btn.style.background = '#1e1e1e';
    btn.style.color = '#3498db';
    btn.style.borderBottom = '2px solid #3498db';
}

// 📡 3. नेटवर्क डिटेल्स पैनल (Headers/Preview/Response)
window.showNetDetail = function(type, btn) {
    const content = document.getElementById('net-detail-content');
    if (!currentNetworkData || !content) return;

    document.querySelectorAll('.net-sub-tab').forEach(t => {
        t.style.color = "#888";
        t.style.borderBottom = "none";
    });
    btn.style.color = "#3498db";
    btn.style.borderBottom = "2px solid #3498db";

    if (type === 'headers') {
        const net = currentNetworkData.network || {};
        content.innerHTML = `
            <div style="margin-bottom: 12px; color: #aaa; font-weight: bold;">▼ General</div>
            <div style="margin-left: 10px; line-height: 1.8;">
                <div><span style="color: #888; width: 110px; display: inline-block;">Request URL:</span> <span style="color: #eee;">${net.requestUrl || 'N/A'}</span></div>
                <div><span style="color: #888; width: 110px; display: inline-block;">Method:</span> <span style="color: #eee;">${net.method || 'POST'}</span></div>
                <div><span style="color: #888; width: 110px; display: inline-block;">Status Code:</span> <span style="color: #27ae60;">● 200 OK</span></div>
            </div>
        `;
    } else {
        const rawData = currentNetworkData.data || currentNetworkData.message || { info: "No Data" };
        content.innerHTML = `<div style="color: #aaa; font-weight: bold; margin-bottom: 8px;">▼ JSON Payload</div>`;
        content.appendChild(createJSONTree(rawData));
    }
}

// 🧹 4. क्लियर लॉग्स
window.clearLogs = function() {
    const consoleLogs = document.getElementById('console-logs');
    const netLogs = document.getElementById('network-logs-list');
    const netPanel = document.getElementById('network-details-panel');
    
    if (consoleLogs) consoleLogs.innerHTML = '';
    if (netLogs) netLogs.innerHTML = '';
    if (netPanel) netPanel.style.display = 'none';
}

// 📥 5. मैसेज रिसीवर (M1 Hub से आने वाला डेटा)
window.addEventListener('message', (event) => {
    if (event.origin !== "https://greenshop.org.in") return;

    let incoming = event.data;
    try {
        if (typeof incoming === 'string') incoming = JSON.parse(incoming);
    } catch(e) {}

    const time = incoming.timestamp || new Date().toLocaleTimeString();

    // 📡 नेटवर्क डेटा हैंडलिंग
    if (incoming.type === 'M3_ACTIVITY' || incoming.type === 'M3_NETWORK_DATA') {
        const list = document.getElementById('network-logs-list');
        if (list) {
            const url = incoming.network?.requestUrl || "api/request";
            const fileName = url.split('/').pop() || "index.php";

            const row = document.createElement('tr');
            row.style = "border-bottom: 1px solid #333; cursor: pointer; color: #5dade2;";
            row.innerHTML = `<td style="padding: 8px 10px;"><i class="fas fa-file-code" style="margin-right:8px; color: #888;"></i>${fileName}</td>`;
            
            row.onclick = () => {
                currentNetworkData = incoming;
                document.getElementById('network-details-panel').style.display = 'flex';
                showNetDetail('headers', document.querySelector('.net-sub-tab'));
            };
            list.prepend(row);
        }
    } 
    // 📥 कंसोल डेटा हैंडलिंग
    else if (incoming.type === 'M3_CONSOLE_LOG' || incoming.type === 'LIVE_LOG_FROM_HUB' || incoming.type === 'RIVER_DATA_FINAL') {
        const container = document.getElementById('console-logs');
        if (!container) return;

        const logType = incoming.logType || 'LOG';
        const rawData = incoming.data || incoming.message || "";
        const entry = document.createElement('div');
        entry.style = "padding: 8px; border-bottom: 1px solid #222; font-family: monospace; border-left: 4px solid #9b59b6;";

        if (logType === 'SUCCESS' || incoming.type === 'RIVER_DATA_FINAL') {
            entry.style.borderColor = "#27ae60";
        } else if (logType === 'ERROR') {
            entry.style.borderColor = "#e74c3c";
        }

        entry.innerHTML = `<span style="color: #666; font-size: 11px;">[${time}]</span> `;
        if (typeof rawData === 'object' && rawData !== null) {
            entry.appendChild(createJSONTree(rawData));
        } else {
            entry.innerHTML += `<span style="color: #eee;">${rawData}</span>`;
        }
        container.prepend(entry);
    }
});



/* =========================================================
   📡 राधिका सिंक इंजन - क्लीन वर्जन (M2 -> M1)
   महेंद्र सिंह जी, अब सारा डेटा सिर्फ M1 में ही सेव होगा! ✨
   ========================================================= */

// M2 (राधिका) का पक्का कोड 🚀
/* =========================================================
    📡 राधिका सिंक इंजन - फाइनल फिक्स्ड वर्जन (M2 -> M1)
   महेंद्र सिंह जी, अब डेटा सही वेरिएबल से उठेगा! ✨
   ========================================================= */

window.addEventListener('message', function(event) {
    const incoming = event.data;

    if (incoming && incoming.type === 'SYNC_SAVE_JS') {
        
        // पक्का करने के लिए कि एडिटर लोड हो चुका है 🌸
        const targetEditor = window.titanEditor || window.jsEditor;

        if (targetEditor) {
            const jsCode = targetEditor.getValue();
            
            // 🚀 M1 (Hub) को ताज़ा कोड भेजना
            window.opener.postMessage({
                type: 'JS_FINAL_SAVE',
                js: jsCode
            }, "*"); 

            console.log("%c 🌸 राधिका: महेंद्र सिंह जी, कोड उठा लिया गया है और M1 को भेज दिया गया है! ", "color: #2ecc71; font-weight: bold;");
        } else {
            console.error("🌸 राधिका: महेंद्र सिंह जी, मुझे एडिटर नहीं मिल रहा है! 🥀");
        }
    }
});

/* =========================================================
   📥 राधिका: पुराना डेटा रिसीवर (M1 -> M2)
   महेंद्र सिंह जी, यह कोड खुलते ही पुरानी JS को एडिटर में भर देगा!
   ========================================================= */
window.addEventListener('message', function(event) {
    // सुरक्षा जांच 🛡️
    if (event.origin !== "https://greenshop.org.in") return;

    const incoming = event.data;

    // अगर M1 ने पुरानी JS भेजी है 📂
    if (incoming && incoming.type === 'LOAD_OLD_JS') {
        
        // पक्का करें कि एडिटर (titanEditor) तैयार है ✨
        const targetEditor = window.titanEditor || window.jsEditor;

        if (targetEditor && incoming.js) {
            targetEditor.setValue(incoming.js);
            
            console.log("%c 🌸 राधिका: महेंद्र सिंह जी, पुरानी तिजोरी से JS कोड निकाल कर एडिटर में सजा दिया गया है! ", "color: #3498db; font-weight: bold;");
        }
    }
});

</script>
</body>
</html>