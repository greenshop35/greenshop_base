



<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenShop God-Mode | Cool Edition</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.36.1/min/vs/loader.min.js"></script>
    <style>
        /* [COOL THEME SYSTEM] */
        :root {
            --primary-glow: #4ec9b0;
            --bg-ultra-dark: #0a0a0a;
            --panel-bg: #141414;
            --header-bg: #1e1e1e;
            --border-color: #2a2a2a;
            --accent-orange: #ff9800;
            --soft-white: #e0e0e0;
        }

        body, html {
            margin: 0; padding: 0; height: 100vh; width: 100vw;
            background: var(--bg-ultra-dark); color: var(--soft-white);
            font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
            overflow: hidden; display: flex; flex-direction: column;
        }

        /* [TOP TOOLBAR - COOL DESIGN] */
        .cool-header {
            height: 70px; background: var(--header-bg);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 30px; border-bottom: 2px solid #000;
            box-shadow: 0 10px 30px rgba(0,0,0,0.7); z-index: 1000;
        }

        .brand-section { display: flex; align-items: center; gap: 15px; }
        .brand-section i { 
            font-size: 30px; color: var(--primary-glow); 
            filter: drop-shadow(0 0 8px var(--primary-glow)); 
        }
        .brand-section h1 { 
            font-size: 20px; font-weight: 900; letter-spacing: 3px; margin: 0; 
            background: linear-gradient(90deg, #fff, var(--primary-glow));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }

        .btn-panel { display: flex; gap: 12px; }
        
        .cool-btn {
            background: #252526; border: 1px solid var(--border-color); color: #ccc;
            padding: 10px 20px; border-radius: 8px; cursor: pointer;
            font-size: 11px; font-weight: 700; display: flex; align-items: center;
            gap: 10px; transition: 0.3s all cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase; box-shadow: 0 4px 0 #000;
        }

        .cool-btn:hover {
            border-color: var(--primary-glow); color: #fff;
            transform: translateY(-2px); box-shadow: 0 6px 15px rgba(78, 201, 176, 0.2);
        }

        .cool-btn:active { transform: translateY(2px); box-shadow: 0 0 0 #000; }

        .btn-primary { background: var(--primary-glow) !important; color: #000 !important; border: none; }
        .btn-primary:hover { filter: brightness(1.2); }

        /* [WORKSPACE - SPLIT VIEW] */
        .workspace {
            flex: 1; display: flex; width: 100%; position: relative;
        }

        /* CSS Panel 400px */
        .pane-css {
            width: 450px; min-width: 450px; max-width: 400px;
            display: flex; flex-direction: column; border-right: 3px solid #000;
            background: var(--panel-bg);
        }

        /* HTML Panel (Flex) */
        .pane-html {
            flex: 1; display: flex; flex-direction: column; background: var(--panel-bg);
        }

        .label-bar {
    background: #1a1a1a;
    padding: 15px 20px;
    font-size: 11px;
    font-weight: 900;
    color: #666;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
    letter-spacing: 2px;
    height: 17px;
}

        .label-bar i { font-size: 16px; }

        /* [EDITOR PLACEHOLDER] */
        /* [EDITOR CONTAINER FIX] */
.editor-container {
    flex: 1;
    width: 100%;
    height: 100%; /* पूरी ऊंचाई के लिए */
    background: #121212;
    position: relative;
    /* हमने flex-center हटा दिया है ताकि एडिटर फैल सके */
    display: block; 
    overflow: hidden;
}

/* अगर आपने पहले ::after वाला text रखा था, तो उसे हटा दें */
.editor-container::after {
    display: none;
}

        /* [SYSTEM FOOTER] */
        .cool-footer {
            height: 30px; background: #007acc; display: flex;
            align-items: center; justify-content: space-between;
            padding: 0 25px; font-size: 11px; font-weight: 700;
            box-shadow: 0 -5px 15px rgba(0,0,0,0.3);
        }

        /* GLOW LINE FOR COOLNESS */
        .bottom-glow {
            height: 2px; width: 100%; background: var(--primary-glow);
            box-shadow: 0 0 10px var(--primary-glow);
        }

/* [JANI SMART SELECTION FIX] */

/* [JANI NORMAL SELECTION RESTORED] */

/* एडिटर का डिफ़ॉल्ट नीला सिलेक्शन वापस लाओ (ताकि कॉपी करने में आसानी हो) */
.monaco-editor .selected-text {
    background-color: rgba(0, 120, 215, 0.4) !important; /* Standard Blue Selection */
    display: block !important; /* इसे वापस दिखाओ */
}

/* आपकी स्पेशल पीली क्लास (जब HTML से क्लिक होकर आए) */
.jani-yellow-bg {
    background-color: #FFD700 !important;
    z-index: 10 !important;
}

/* काला और सॉलिड टेक्स्ट - जो कभी नहीं छुपेगा */
.jani-solid-black-text {
    color: #000000 !important;
    -webkit-text-fill-color: #000000 !important;
    font-weight: 900 !important;
    z-index: 20 !important;
    position: relative;
}
#titan-global-loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: #050505; /* एकदम डार्क */
    z-index: 999999; /* सबसे ऊपर */
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.8s ease, visibility 0.8s;
}

.loader-content {
    text-align: center;
    width: 300px;
}

.titan-logo-spin {
    font-size: 50px;
    color: #00ff88;
    margin-bottom: 30px;
    text-shadow: 0 0 20px rgba(0, 255, 136, 0.5);
    animation: spin-titan 2s infinite linear;
}

.loader-track {
    width: 100%;
    height: 2px;
    background: rgba(255,255,255,0.05);
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 15px;
}

.loader-fill {
    width: 0%; /* JS से कंट्रोल होगा */
    height: 100%;
    background: #00ff88;
    box-shadow: 0 0 15px #00ff88;
    transition: width 0.4s ease;
}

.loader-status {
    display: flex;
    justify-content: space-between;
    color: #00ff88;
    font-family: 'JetBrains Mono', monospace;
    font-size: 10px;
    letter-spacing: 2px;
}

@keyframes spin-titan {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* लोड होने के बाद क्लास */
.titan-ready {
    opacity: 0;
    visibility: hidden;
}
.cool-btn {
    background: #1e1e1e;
    color: #fff;
    border: 1px solid rgba(255, 165, 0, 0.3); /* ऑरेंज ग्लो के लिए */
    padding: 10px 20px;
    border-radius: 10px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
}

.cool-btn:hover {
    border-color: var(--accent-orange, orange);
    box-shadow: 0 0 15px rgba(255, 165, 0, 0.2);
    transform: translateY(-2px);
}

/* जादू वाला एनीमेशन */
.magic-glow {
    animation: magic-sparkle 0.8s ease-in-out;
}

@keyframes magic-sparkle {
    0% { transform: scale(1); filter: brightness(1); }
    50% { transform: scale(1.2) rotate(20deg); filter: brightness(1.5); }
    100% { transform: scale(1); filter: brightness(1); }
}
.tool-tab {
    flex: 1;
    background: transparent;
    border: none;
    color: #666;
    padding: 8px;
    font-size: 11px;
    cursor: pointer;
    border-bottom: 2px solid transparent;
    transition: 0.3s;
}

.tool-tab.active {
    color: #00ffcc;
    border-bottom: 2px solid #00ffcc;
    background: rgba(0, 255, 204, 0.05);
}

.tool-tab i {
    margin-right: 5px;
}
.workspace {
    display: flex;
    height: calc(100vh - 100px); /* हेडर और फुटर छोड़कर */
    overflow: hidden;
}

.pane-folder {
    border-right: 1px solid #333;
    background: #1a1a1a;
}

.file-list {
    list-style: none;
    padding: 10px;
    color: #ccc;
    font-size: 13px;
}

.file-list li {
    padding: 5px 0;
    cursor: pointer;
}

.file-list li:hover {
    color: #00ffcc; /* राधिका एआई वाला कलर ✨ */
}
/* महेंद्र सिंह जी, यह क्लास चुने हुए आइटम को चमकाएगी ✨🌻 */
.option-item.active-choice {
    background: #1a1a1a !important;
    border: 1px solid #00ffcc !important;
    box-shadow: 0 0 10px rgba(0, 255, 204, 0.3);
    transform: translateY(-2px);
}
/* महेंद्र सिंह जी, यह कोड स्क्रॉल बार को पूरी तरह छुपा देगा ✨ */
.folder-content {
    overflow-y: scroll; /* स्क्रॉल काम करेगा */
    height: calc(100vh - 180px);
    background: #111;
    
    /* Chrome, Safari और Opera के लिए */
    -ms-overflow-style: none;  /* IE और Edge के लिए */
    scrollbar-width: none;  /* Firefox के लिए */
}

.folder-content::-webkit-scrollbar {
    display: none; /* Chrome और Safari में छुपाने के लिए ✨ */
}
    </style>
</head>
<body>

<header class="cool-header">
    <div class="brand-section">
        <i class="fas fa-biohazard"></i>
        <h1>GREENSHOP <span>Studio</span></h1>
    </div>

    <div class="btn-panel">
        
        <button class="cool-btn" style="border-left: 4px solid #3498db;"><i class="fas fa-download" style="color:#3498db"></i> Save</button>
        <button class="cool-btn"><i class="fas fa-undo" style="color:#ff5f56"></i> Undo</button>
        <button class="cool-btn"><i class="fas fa-redo" style="color:#27c93f"></i> Redo</button>
        <button class="cool-btn"><i class="fas fa-sync-alt" style="color:var(--primary-glow)"></i> Change Class</button>
        <button class="cool-btn"><i class="fas fa-desktop" style="color:#007acc"></i> Live View</button>
        <button class="cool-btn"><i class="fas fa-wand-magic-sparkles" style="color:#007acc"></i> JS Mode</button>
        <button class="cool-btn"><i class="" style="color:var(--accent-orange)"></i> Format</button>
        <button class="cool-btn btn-primary"><i class="fas fa-copy"></i> Copy All</button>
    </div>
</header>

<div class="bottom-glow"></div>

<main class="workspace" id="web-workspace">
<div class="pane-folder">
    <div class="label-bar" style="display: flex; justify-content: space-between; align-items: center; padding: 5px 10px;">
        <span><i class="fas fa-project-diagram" style="color:#00ffcc"></i> PROJECT ROOT</span>
        <span id="file-count" style="color:#00ffcc; font-size: 10px;">0 ITEMS</span>
    </div>
    
    <div class="folder-search" style="padding: 8px; display: flex; gap: 8px; align-items: center; background: #161616;">
        <div style="position: relative; flex-grow: 1;">
            <i class="fas fa-search" style="position: absolute; left: 8px; top: 9px; color: #555; font-size: 10px;"></i>
            <input type="text" id="fileSearch" placeholder="ढूंढें..." style=" background: #0a0a0a; border: 1px solid #222; color: #00ffcc; padding: 6px 6px 6px 25px; font-size: 11px; outline: none; border-radius: 4px;">
        </div>

        <button onclick="openCreationCard()" title="नया बनाएँ" style="background: #1a1a1a; border: 1px solid #333; color: #ffcc00; cursor: pointer; padding: 5px 12px; border-radius: 4px; flex-shrink: 0;">
            <i class="fas fa-plus"></i>
        </button>
    </div>

    <div class="folder-content" style="overflow-y: auto; height: calc(100vh - 180px); background: #111;">
        <ul class="file-list" id="project-file-list" style="margin: 0; padding: 0; list-style: none;">
            @foreach($projectItems as $item)
                {{-- यहाँ पाथ को आपकी फाइल लोकेशन के हिसाब से सेट किया है सर ✨ --}}
                @include('studio.tree-item', ['item' => $item])
            @endforeach
        </ul>
    </div>
</div>

<div id="creationCard" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.85); z-index: 9999; align-items: center; justify-content: center;">
    <div style="background: #111; border: 1px solid #00ffcc; width: 320px; border-radius: 10px; overflow: hidden; box-shadow: 0 0 20px rgba(0,255,204,0.2);">
        
        <div style="background: #1a1a1a; padding: 12px; border-bottom: 1px solid #333; display: flex; justify-content: space-between; align-items: center;">
            <span style="color: #00ffcc; font-size: 13px; font-weight: bold;"><i class="fas fa-plus-circle"></i> नया आइटम बनाएँ</span>
            <button onclick="closeCreationCard()" style="background:none; border:none; color:#ff2d20; cursor:pointer; font-size:18px;">&times;</button>
        </div>

        <div id="currentLocationDisplay" style="background: #050505; padding: 10px 15px; border-bottom: 1px solid #222; border-left: 3px solid #00ffcc;">
            <span style="color:#555; font-size:10px;">पाथ लोड हो रहा है...</span>
        </div>
        
        <div style="padding: 15px;">
            <div id="optionGrid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-bottom: 15px;">
                <div class="create-option" onclick="prepareInput(this, 'folder')" style="cursor:pointer; background:#0a0a0a; padding:12px 5px; border-radius:5px; text-align:center; border:1px solid #222; transition: 0.2s;">
                    <i class="fas fa-folder" style="color:#f1c40f; font-size:20px;"></i><br>
                    <span style="color:#eee; font-size:10px;">Folder</span>
                </div>
                <div class="create-option" onclick="prepareInput(this, 'php')" style="cursor:pointer; background:#0a0a0a; padding:12px 5px; border-radius:5px; text-align:center; border:1px solid #222; transition: 0.2s;">
                    <i class="fab fa-php" style="color:#777bb4; font-size:20px;"></i><br>
                    <span style="color:#eee; font-size:10px;">PHP</span>
                </div>
                <div class="create-option" onclick="prepareInput(this, 'html')" style="cursor:pointer; background:#0a0a0a; padding:12px 5px; border-radius:5px; text-align:center; border:1px solid #222; transition: 0.2s;">
                    <i class="fab fa-html5" style="color:#e34f26; font-size:20px;"></i><br>
                    <span style="color:#eee; font-size:10px;">HTML</span>
                </div>
                <div class="create-option" onclick="prepareInput(this, 'css')" style="cursor:pointer; background:#0a0a0a; padding:12px 5px; border-radius:5px; text-align:center; border:1px solid #222; transition: 0.2s;">
                    <i class="fab fa-css3-alt" style="color:#1572b6; font-size:20px;"></i><br>
                    <span style="color:#eee; font-size:10px;">CSS</span>
                </div>
                <div class="create-option" onclick="prepareInput(this, 'js')" style="cursor:pointer; background:#0a0a0a; padding:12px 5px; border-radius:5px; text-align:center; border:1px solid #222; transition: 0.2s;">
                    <i class="fab fa-js" style="color:#f7df1e; font-size:20px;"></i><br>
                    <span style="color:#eee; font-size:10px;">JS</span>
                </div>
            </div>

            <div id="creationInputArea" style="display:none; border-top: 1px solid #222; padding-top: 15px;">
                <input type="text" id="itemNameInput" placeholder="नाम लिखें..." style="width: 93%;background: #000;border: 1px solid #333;color: #00ffcc;padding: 10px;border-radius: 4px;outline: none;font-size: 13px;margin-bottom: 10px;">
                <button onclick="submitNewItem()" style="width: 100%; background: #00ffcc; color: #000; border: none; padding: 10px; border-radius: 4px; cursor: pointer; font-weight: bold; font-size: 12px; transition: 0.3s;">तैयार है ✨</button>
            </div>
        </div>
    </div>
</div>

<style>
    .option-active {
        border: 1px solid #00ffcc !important;
        background: #161616 !important;
        box-shadow: 0 0 10px rgba(0, 255, 204, 0.2);
        transform: scale(1.05);
    }
</style>

<script>
let pathHistory = []; 
let currentCreateType = '';

function updateFileCount() {
    const fileItems = document.querySelectorAll('#project-file-list .file-item');
    const fileCountSpan = document.getElementById('file-count');
    if(fileCountSpan) fileCountSpan.innerText = fileItems.length + " ITEMS";
}



function loadRootFolders() {
    fetch('/studio/get-folder-content', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify({ folder_path: '' }) 
    })
    .then(res => res.json())
    .then(data => renderFileList(data));
}

function openCreationCard() {
    // 1. हिस्ट्री से पूरा पाथ लें ✨
    let fullPath = pathHistory.length > 0 ? pathHistory[pathHistory.length - 1] : 'Project Root';
    
    // 2. महेंद्र सिंह जी, यहाँ हम फालतू के लंबे पाथ को हटा रहे हैं ✂️
    // हम '/home/uqtezswj/greenshop_base/' को खाली स्ट्रिंग से बदल देंगे
    let baseToRemove = "/home/uqtezswj/greenshop_base/";
    let cleanPath = fullPath.replace(baseToRemove, "");

    // अगर क्लीन करने के बाद पाथ खाली बचता है, तो उसे '/' दिखाएँ 😊
    if (cleanPath === "" || cleanPath === "/") {
        cleanPath = "Root";
    }

    const displayArea = document.getElementById('currentLocationDisplay');
    if(displayArea) {
        displayArea.innerHTML = `
            <div style="background: #0a0a0a; padding: 10px; border-radius: 6px; border-left: 4px solid #00ffcc; margin-bottom: 10px;">
                <span style="color: #555; font-size: 9px; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 4px;">
                    <i class="fas fa-folder-tree"></i> Working Directory:
                </span>
                <span style="color: #00ffcc; font-size: 12px; font-family: 'Courier New', monospace; word-break: break-all; font-weight: bold;">
                    ${cleanPath}
                </span>
            </div>
        `;
    }

    document.getElementById('creationCard').style.display = 'flex';
    document.getElementById('creationInputArea').style.display = 'none';
}
function openInEditor(path, type, saveToHistory = true) {
    if (type === 'folder') {
        // महेंद्र सिंह जी, यहाँ हम असली पाथ को हिस्ट्री में डाल रहे हैं ✨
        if (saveToHistory && path) {
            // हम केवल तभी पाथ जोड़ेंगे जब वह पिछले पाथ से अलग हो 😊
            if (pathHistory.length === 0 || pathHistory[pathHistory.length - 1] !== path) {
                pathHistory.push(path);
            }
        }

        fetch('/studio/get-folder-content', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ folder_path: path })
        })
        .then(response => response.json())
        .then(data => {
            renderFileList(data); 
            console.log("🌸 फोल्डर बदला: " + path);
        });
    }
}
function closeCreationCard() {
    document.getElementById('creationCard').style.display = 'none';
}

function prepareInput(element, type) {
    currentCreateType = type;
    document.querySelectorAll('.create-option').forEach(el => el.classList.remove('option-active'));
    element.classList.add('option-active');
    document.getElementById('creationInputArea').style.display = 'block';
    const input = document.getElementById('itemNameInput');
    input.value = (type === 'folder') ? "" : "." + type;
    input.focus();
    if(type !== 'folder') input.setSelectionRange(0, 0);
}

function submitNewItem() {
    const name = document.getElementById('itemNameInput').value;
    const currentPath = pathHistory.length > 0 ? pathHistory[pathHistory.length - 1] : '';
    if(!name) return alert("महेंद्र सिंह जी सर, नाम ज़रूरी है! 😊");

    fetch('/studio/create-item', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify({ name: name, type: currentCreateType, parent_path: currentPath })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            closeCreationCard();
            openInEditor(currentPath, 'folder', false);
        } else {
            alert("Error: " + data.error);
        }
    });
}

function renderFileList(data) {
    const list = document.getElementById('project-file-list');
    list.innerHTML = ''; 
    data.forEach(item => {
        const li = document.createElement('li');
        li.className = 'file-item';
        li.style = "display: flex; align-items: center; gap: 10px; padding: 8px 12px; cursor: pointer; border-bottom: 1px solid #1a1a1a; transition: background 0.2s;";
        li.innerHTML = `
            <i class="${item.icon}" style="color:${item.color}; font-size: 14px; width: 16px; text-align: center;"></i>
            <div style="overflow: hidden; flex: 1;">
                <span style="display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 13px; color: #eee;">${item.name}</span>
            </div>
            ${item.type === 'folder' ? '<i class="fas fa-chevron-right" style="color: #333; font-size: 8px;"></i>' : ''}
        `;
        li.onclick = () => openInEditor(item.full_path, item.type);
        list.appendChild(li);
    });
    updateFileCount();
}

// --- 9. फोल्डर को खोलने और बंद करने (Toggle) का लॉजिक ✨ ---
function toggleFolder(path, element) {
    // महेंद्र सिंह जी, यहाँ हम पूरा असली पाथ (Full Path) पकड़ रहे हैं ✨
    if (path) {
        if (pathHistory.length === 0 || pathHistory[pathHistory.length - 1] !== path) {
            pathHistory.push(path); 
            console.log("🌸 Full Path Tracked: " + path);
        }
    }

    const subTree = element.parentElement.querySelector('.sub-tree');
    const chevron = element.querySelector('.chevron-icon');

    if (subTree) {
        if (subTree.style.display === 'none' || subTree.style.display === '') {
            if (subTree.innerHTML.trim() === '') {
                fetch('/studio/get-folder-content', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ folder_path: path })
                })
                .then(response => response.json())
                .then(data => {
                    renderSubTree(subTree, data);
                    subTree.style.display = 'block';
                    if(chevron) chevron.style.transform = 'rotate(90deg)';
                });
            } else {
                subTree.style.display = 'block';
                if(chevron) chevron.style.transform = 'rotate(90deg)';
            }
        } else {
            subTree.style.display = 'none';
            if(chevron) chevron.style.transform = 'rotate(0deg)';
        }
    }
}

// --- 10. सब-ट्री रेंडर करने का फंक्शन 🌻 ---
function renderSubTree(container, data) {
    container.innerHTML = '';
    data.forEach(item => {
        const li = document.createElement('li');
        li.className = 'tree-node';
        li.style.listStyle = 'none';
        
        // जानी... यहाँ हम वही स्ट्रक्चर बना रहे हैं जो ब्लेड में है ✨
        li.innerHTML = `
            <div class="file-item" 
                 onclick="${item.type === 'folder' ? `toggleFolder('${item.full_path.replace(/\\/g, '\\\\')}', this)` : `openFile('${item.full_path.replace(/\\/g, '\\\\')}')`}" 
                 style="display: flex; align-items: center; gap: 10px; padding: 6px 12px; cursor: pointer; border-bottom: 1px solid #1a1a1a;">
                <i class="${item.icon}" style="color:${item.color}; font-size: 14px; width: 16px; text-align: center;"></i>
                <span style="font-size: 13px; color: #eee;">${item.name}</span>
                ${item.type === 'folder' ? '<i class="fas fa-chevron-right chevron-icon" style="color: #333; font-size: 8px; margin-left: auto;"></i>' : ''}
            </div>
            ${item.type === 'folder' ? '<ul class="sub-tree" style="list-style: none; padding-left: 15px; display: none; border-left: 1px solid #222; margin-left: 18px;"></ul>' : ''}
        `;
        container.appendChild(li);
    });
}

// --- 11. फाइल खोलने का फंक्शन 🌸 ---
@verbatim
function openFile(path) {
    console.log("🚀 महेंद्र सिंह जी, डेटा की तलाश शुरू... पाथ: " + path);

    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    fetch('/studio/read-file', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ file_path: path })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success' && data.files) {
            console.log("✅ " + data.files.length + " फाइलें प्रोसेस हो रही हैं...");

            // 1. मुख्य फाइल (business_index) को बेस बनाएँ
            let mainFile = data.files.find(f => f.is_main === true) || data.files[0];
            let fullHTML = mainFile.content;

            // 2. 🛡️ जादुई लूप: @include वाली जगहों पर दूसरी फाइलों का कंटेंट भरें
            data.files.forEach(file => {
                if (!file.is_main) {
                    let shortName = file.file_name.replace('.blade.php', '');
                    // @include('path.to.filename') को ढूंढकर कंटेंट से बदलें
                    let includePattern = new RegExp(`@include\\(['"].*?${shortName}['"]\\)`, 'g');
                    
                    if (fullHTML.match(includePattern)) {
                        fullHTML = fullHTML.replace(includePattern, file.content);
                    }
                }
            });

            // 3. ✨ प्रीमियम क्लीनिंग: ब्राउज़र में सिर्फ शुद्ध HTML/CSS दिखे
            fullHTML = fullHTML
                .replace(/@php[\s\S]*?@endphp/g, '')             // PHP ब्लॉक्स हटाएँ
                .replace(/{{--[\s\S]*?--}}/g, '')               // Blade कमेंट्स हटाएँ
                .replace(/@extends\(.*?\)/g, '')                 // Extends हटाएँ
                .replace(/@section\(.*?\)|@endsection/g, '')     // Sections हटाएँ
                .replace(/@yield\(.*?\)/g, '')                   // Yield हटाएँ
                .replace(/{{.*?}}|{!!.*?!!}/g, '')               // वेरिएबल्स हटाएँ (जैसे {{ $view }})
                .replace(/@if\(.*?\)|@else|@elseif\(.*?\)|@endif/g, '') // कंडीशन्स हटाएँ
                .replace(/@include\(.*?\)/g, '');               // बचे हुए @includes हटाएँ

            // 4. 🖥️ नई विंडो में प्रीमियम प्रिव्यू दिखाएँ
            const previewWindow = window.open('', '_blank');
            if (previewWindow) {
                previewWindow.document.write(`
                    <!DOCTYPE html>
                    <html lang="hi">
                    <head>
                        <meta charset="UTF-8">
                        <title>Green Shop - Live Preview 🌸</title>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
                        <style>
                            body { margin: 0; padding: 0; background: #f4f7f6; }
                            /* प्रिव्यू को और सुंदर बनाने के लिए छोटा सा ओवरले */
                        </style>
                    </head>
                    <body>
                        ${fullHTML}
                    </body>
                    </html>
                `);
                previewWindow.document.close();
            }

        } else {
            console.error("⚠️ महेंद्र सिंह जी, फाइलें नहीं मिल पाईं!", data);
        }
    })
    .catch(error => {
        console.error('🔥 Error:', error);
        alert("माफ़ कीजिये महेंद्र सिंह जी, कुछ तकनीकी दिक्कत आ गई है। 🔍");
    });
}
@endverbatim

document.addEventListener('DOMContentLoaded', updateFileCount);
</script>
    <div class="pane-css">
        <div class="label-bar">
            <span><i class="fab fa-css3-alt" style="color:#2965f1"></i> CSS ENGINE</span>
            <span style="color:var(--primary-glow)">400PX</span>
        </div>
        <div class="editor-container" id="css-editor-div"></div>
    </div>

    <div class="pane-html">
        <div class="label-bar">
            <span><i class="fab fa-html5" style="color:#e34c26"></i> HTML STRUCTURE</span>
            <span id="sync-status" style="color:#27c93f">● ACTIVE</span>
        </div>
        <div class="editor-container" id="html-editor-div"></div>
    </div>
</main>
  <div id="titan-global-loader">
    <div class="loader-content">
        <i class="fas fa-biohazard titan-logo-spin"></i>
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
        <div class="loader-status">
            <span id="load-text">INITIALIZING TITAN CORE...</span>
            <div class="loader-percentage" id="load-percent">0%</div>
        </div>
    </div>
</div>
<footer class="cool-footer">
    <div class="a">
        <button class="radhika-footer-btn" onclick="toggleSidebar()">
            <i class="fas fa-microchip"></i> 
            <span>RADHIKA AI CORE | ONLINE</span>
            <span class="online-dot"></span>
        </button>
        
        <div class="terminal-text">
            <i class="fas fa-terminal"></i> JANI GOD-MODE CORE: 2026 EDITION
        </div>
    </div>
    
    <div class="footer-info">UTF-8 | LARAVEL READY | FONT AWESOME ENABLED</div>
</footer>
<div id="radhikaSidebar" class="sidebar">
    <div id="sidebar-content-area">
        <p style="color: #00ffcc; padding: 20px;">सिस्टम लोड हो रहा है... ✨</p>
    </div>
</div>

<script>
    // दूसरी फाइल को बिना iframe के खींचने का जादू
    function loadRadhikaCore() {
        fetch('jani_ai_core.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('sidebar-content-area').innerHTML = data;
            })
            .catch(err => {
                console.error("फाइल लोड नहीं हुई:", err);
            });
    }

    function toggleSidebar() {
        var sidebar = document.getElementById("radhikaSidebar");
        if (sidebar.style.width === "400px") {
            sidebar.style.width = "0";
        } else {
            sidebar.style.width = "400px";
            loadRadhikaCore(); // बटन दबाते ही फाइल लोड होगी
        }
    }
</script>

<style>
    /* साइडबार की स्टाइलिंग */
    .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 99999;
        top: 0;
        left: 0;
        background-color: #1a1f2b;
        transition: 0.5s ease;
        border-right: 2px solid #00ffcc;
        
        /* महेंद्र सिंह जी, यहाँ से स्क्रॉलबार गायब हो जाएगी (None) */
        overflow-y: auto; 
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE/Edge */
    }

    /* Chrome, Safari के लिए स्क्रॉलबार छुपाना */
    .sidebar::-webkit-scrollbar {
        display: none;
    }

    #sidebar-content-area {
        width: 100%;
        height: 100%;
    }
</style>
<style>
    /* पूरे फुटर की सेटिंग */
    

    /* लेफ्ट साइड का हिस्सा (बटन और टेक्स्ट) */
    .a {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    /* आपका प्यारा राधिका AI बटन */
    .radhika-footer-btn {
        width: auto !important;
        height: 35px !important;
        padding: 0 15px;
        background-color: transparent;
        color: #00ffcc;
        border: 1px solid #00ffcc;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: bold;
        transition: 0.3s ease;
    }

    .radhika-footer-btn:hover {
        background-color: #00ffcc;
        color: #111;
        box-shadow: 0 0 15px #00ffcc;
    }

    /* ऑनलाइन वाला ब्लिंकिंग डॉट 🟢 */
    .online-dot {
        width: 8px;
        height: 8px;
        background-color: #ff0055; /* रेड या ग्रीन जो आप चाहें */
        border-radius: 50%;
        display: inline-block;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.3); opacity: 0.5; }
        100% { transform: scale(1); opacity: 1; }
    }

    

   
</style>
<script>
/* =========================================================
   📡 JANI EDITOR - TITAN CORE (FINAL PRECISION VERSION 2026)
   महेंद्र सिंह जी, यह कोड रैंडम नामों के साथ सटीक जंप करेगा! ✨
   ========================================================= */

// 🔒 रैंडम सुरक्षा नाम (ताकि कोड में पहचान न आए)
const rx_7v = "rx_7v"; // लाइन हाईलाइट ✨
const tx_2m = "tx_2m"; // टेक्स्ट फोकस 🎯

// 🎀 1. हाईलाइट के लिए ग्लोबल होल्डर्स
window.janiHighlighter = { css: [], html: [] };
window.lastProcessedId = ""; 

// 🛠️ 2. रिसीवर इंजन (M3 -> HUB -> EDITORS)
window.addEventListener('message', function(event) {
    if (event.origin !== "https://greenshop.org.in") return;

    const incoming = event.data;

    if (incoming && incoming.type === 'RSW_SELECTOR_DATA') {
        
        console.log("%c 🚀 राधिका: सटीक सिग्नल मिला! डेटा प्रोसेस कर रही हूँ... ", "background: #00ff00; color: #000; padding: 4px;");

        if (!window.cssEditor || !window.htmlEditor) {
            console.warn("⚠️ महेंद्र सिंह जी, अभी एडिटर्स पूरी तरह लोड नहीं हुए हैं!");
            return;
        }

        const { id, css_class, tagName, index } = incoming;
        const targetIndex = index || 0;

        // --- 🎨 CSS एडिटर सटीक हाईलाइट ---
        if (css_class) {
            const searchCSS = id ? `#${id.replace('#','')}` : `.${css_class.replace('.','')}`;
            applyPrecisionHighlight(window.cssEditor, searchCSS, 'css', targetIndex);
        }

        // --- 📝 HTML एडिटर सटीक हाईलाइट ---
        const htmlSearch = id ? `id="${id.replace('#','')}"` : (css_class ? `class="${css_class.replace('.','')}"` : `<${tagName}`);
        applyPrecisionHighlight(window.htmlEditor, htmlSearch, 'html', targetIndex);
    }

    if (['M3_CONSOLE_LOG', 'M3_NETWORK_DATA', 'M3_ACTIVITY'].includes(incoming.type)) {
        if (window.liveWindow2 && !window.liveWindow2.closed) {
            window.liveWindow2.postMessage(incoming, "*");
        }
    }
});

/**
 * 🎯 [PRECISION SELECTOR] - रैंडम नामों के साथ जंप करना ✨
 */
function applyPrecisionHighlight(editor, searchText, type, index) {
    if (!searchText || searchText.length < 2) return;
    const model = editor.getModel();
    if (!model) return;

    window.janiHighlighter[type] = editor.deltaDecorations(window.janiHighlighter[type], []);

    const matches = model.findMatches(searchText, false, false, true, null, true);
    const targetMatch = matches[index] || matches[0];

    if (targetMatch) {
        const range = targetMatch.range;
        editor.revealRangeInCenter(range); 

        window.janiHighlighter[type] = editor.deltaDecorations([], [{
            range: range,
            options: { 
                className: rx_7v,      // 👈 रैंडम क्लास
                inlineClassName: tx_2m, // 👈 रैंडम क्लास
                zIndex: 10000 
            }
        }]);
        
        console.log(`✅ ${type.toUpperCase()}: ${index + 1}वां सटीक मैच मिल गया! 🌸`);
    }
}

/* 🌸 3. TITAN UI स्टाइल्स (Simple & Clean) */
const janiStyle = document.createElement('style');
janiStyle.innerHTML = `
    /* 1. पूरी लाइन पर कोई भारी बैकग्राउंड नहीं ✨ */
    .${rx_7v} { 
        background-color: rgba(255, 255, 255, 0.05) !important; 
    }

    /* 2. सिर्फ टेक्स्ट को साफ़ दिखाने के लिए पीला रंग और अंडरलाइन 🎨 */
    .${tx_2m} { 
        color: #ffeb3b !important; 
        font-weight: bold !important; 
        text-decoration: underline !important; 
        background: none !important; 
    }

    /* 3. करंट लाइन के लिए सफ़ेद पट्टी 📏 */
    .monaco-editor .margin-view-overlays .current-line { 
        border-left: 2px solid #ffffff !important; 
    }
`;
document.head.appendChild(janiStyle);
</script>
<style>
/* 🌸 महेंद्र सिंह जी, इस नए लॉजिक के लिए ये नई स्टाइल इस्तेमाल करें */
.jani-new-highlight {
    background-color: rgba(255, 235, 59, 0.4) !important; /* हल्का पीला ग्लो */
    border-bottom: 2px solid #ffeb3b; /* नीचे एक लाइन */
}
.jani-text-focus {
    color: #ffffff !important;
    background-color: #e91e63 !important; /* गुलाबी बैकग्राउंड टेक्स्ट पर */
    font-weight: bold;
    border-radius: 3px;
    padding: 0 2px;
}
</style>
<script>
/* =========================================================
   जानी एडिटर इंजन - TITAN CORE (Updated by Radhika 🌸)
   ========================================================= */
let janiDecorations = [];
require.config({ paths: { vs: 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.36.1/min/vs' } });

let cssEditor, htmlEditor;

/* =========================================================
   जानी एडिटर इंजन - MONITOR-3 SYNC (Updated by Radhika 🌸)
   महेंद्र सिंह जी, यह कोड सीधा लाइव व्यू को कंट्रोल करेगा! 🎯
   ========================================================= */

/* =========================================================
   जानी एडिटर इंजन - मॉनिटर-3 स्मार्ट सिंक (Fixed by Radhika ✨)
   ========================================================= */

window.liveWindow3 = null; 
const webLiveView_Controls = document.querySelector('.cool-btn i.fa-desktop').parentElement;

// --- 📡 [M3 SYNC ENGINE] - स्मार्ट डेटा ट्रांसफर ---
window.broadcastToLiveView = function(updateType = 'ALL') {
    if (!htmlEditor || !cssEditor) return;

    // महेंद्र सिंह जी, यहाँ हम तय कर रहे हैं कि मॉनिटर को क्या भेजना है 🎯
    let payload = { type: 'UPDATE_UI' };

    if (updateType === 'HTML' || updateType === 'ALL') {
        payload.html = htmlEditor.getValue();
    }
    if (updateType === 'CSS' || updateType === 'ALL') {
        payload.css = cssEditor.getValue();
    }

    if (window.liveWindow3 && !window.liveWindow3.closed) {
        window.liveWindow3.postMessage(payload, "*");
        // console.log(`🌸 ${updateType} डेटा भेज दिया गया है, सर!`); 
    }
};

// --- 🖥️ मॉनिटर 3 लॉन्च कंट्रोल (बटन क्लिक पर) ---
webLiveView_Controls.onclick = function() {
    const screenWidth = window.screen.width; 
    
    if (window.liveWindow3 === null || window.liveWindow3.closed) {
        window.liveWindow3 = window.open(
            "/studio/third_monitor", // सर, यहाँ से '.php' हटा दिया है ✨
            "JaniLiveView_Right", 
            "width=1200,height=800,left=" + screenWidth + ",top=0"
        );
        console.log("🚀 महेंद्र सिंह जी, मॉनिटर-3 सफलतापूर्वक लॉन्च हो गया है!");
    } else {
        window.liveWindow3.focus();
    }

    // डेटा भेजने का लॉजिक ✨🌻
    setTimeout(() => { 
        if (typeof window.broadcastToLiveView === 'function') {
            window.broadcastToLiveView('ALL'); 
        }
    }, 1200); 
};

// --- ✍️ एडिटर इवेंट्स (यहाँ अलग-अलग डेटा जाएगा) ---


require(['vs/editor/editor.main'], function () {
    
    cssEditor = monaco.editor.create(document.querySelector('.pane-css .editor-container'), {
        value: "/* CSS यहाँ टाइप करें */\n.gbox1s {\n    background: #4ec9b0;\n}",
        language: 'css',
        theme: 'vs-dark',
        automaticLayout: true,
        fontSize: 16,
        fontFamily: "'Cascadia Code', 'Fira Code', monospace",
        minimap: { enabled: false },
        cursorBlinking: "smooth",
        formatOnPaste: true,
        wordWrap: "off", 
        scrollBeyondLastLine: false,
        scrollbar: {
            horizontal: 'visible',
            horizontalScrollbarSize: 8
        }
    });

    htmlEditor = monaco.editor.create(document.querySelector('.pane-html .editor-container'), {
        value: "\n<div class=\"gbox1s\">\n    <h1>Jani God-Mode</h1>\n</div>",
        language: 'html',
        theme: 'vs-dark',
        automaticLayout: true,
        fontSize: 16,
        fontFamily: "'Cascadia Code', 'Fira Code', monospace",
        minimap: { enabled: false },
        cursorBlinking: "smooth",
        formatOnPaste: true,
        wordWrap: "off",
        scrollBeyondLastLine: false,
        scrollbar: {
            horizontal: 'visible',
            horizontalScrollbarSize: 8
        }
    });

    const handleJaniClick = function (targetPos) {
    const model = htmlEditor.getModel();
    const wordInfo = model.getWordAtPosition(targetPos);
    
    // 🧹 पुरानी चमक हटाना ✨
    janiDecorations = cssEditor.deltaDecorations(janiDecorations, []);

    if (wordInfo && wordInfo.word) {
        const clickedName = wordInfo.word; 
        const lineContent = model.getLineContent(targetPos.lineNumber);

        // 🔍 'Satik' पहरेदार: क्या यह सच में Class/ID का हिस्सा है? 🛡️
        const isTag = lineContent.includes(`<${clickedName}`) || lineContent.includes(`</${clickedName}`);
        const isAttributeValue = lineContent.includes(`class="${clickedName}"`) || 
                                 lineContent.includes(`id="${clickedName}"`) ||
                                 lineContent.includes(`class='${clickedName}'`) ||
                                 lineContent.includes(`id='${clickedName}'`);

        if (isTag || !isAttributeValue) {
            console.log(`%c🌸 राधिका: "${clickedName}" को इग्नोर कर रही हूँ।`, "color: #95a5a6;");
            return; 
        }

        // 🕵️‍♀️ 1. 'Line Scanner': पूरी लाइन से ID और Class दोनों निकालना ✨
        const childIdMatch = lineContent.match(/id=["']([^"']+)["']/);
        const childClassMatch = lineContent.match(/class=["']([^"']+)["']/);
        
        const childId = childIdMatch ? childIdMatch[1] : "null";
        const childClass = childClassMatch ? childClassMatch[1] : "null";

        // 👨‍👩‍👧‍👦 2. 'Parent Scanner': ऊपर की 5 लाइनों में ID और Class ढूँढना
        let parentId = "null";
        let parentClass = "null";

        for (let i = targetPos.lineNumber - 1; i >= Math.max(1, targetPos.lineNumber - 5); i--) {
            const pLine = model.getLineContent(i);
            const pIdM = pLine.match(/id=["']([^"']+)["']/);
            const pClassM = pLine.match(/class=["']([^"']+)["']/);

            if (pIdM || pClassM) {
                parentId = pIdM ? pIdM[1] : "null";
                parentClass = pClassM ? pClassM[1] : "null";
                if (pLine.includes('<div')) break; // पैरेंट मिलते ही रुक जाओ 🛑
            }
        }

        // 🎯 भाग 1: M2 को 'Full Data Packet' भेजना 🚀
        if (window.liveWindow2 && !window.liveWindow2.closed) {
            window.liveWindow2.postMessage({
                callss: childClass,     
                id: childId,            
                perent: {               
                    class: parentClass,
                    id: parentId
                }
            }, "*");
            
            console.log(`%c🌸 राधिका: पैकेट रवाना! [C: .${childClass} #${childId}] [P: .${parentClass} #${parentId}]`, "color: #2ecc71; font-weight: bold;");
        }

        // 🎯 भाग 2: CSS Highlighting (जो शब्द क्लिक किया है उस पर) 🟡
        const prefix = model.getValueInRange({
            startLineNumber: targetPos.lineNumber,
            startColumn: wordInfo.startColumn - 1,
            endLineNumber: targetPos.lineNumber,
            endColumn: wordInfo.startColumn
        });
        const isIdSelect = (prefix === '#');
        const searchPattern = isIdSelect ? "#" + clickedName : "." + clickedName;

        const matches = cssEditor.getModel().findMatches(searchPattern);
        if (matches.length > 0) {
            const range = matches[0].range;
            cssEditor.focus(); 
            cssEditor.setSelection(range);
            cssEditor.revealLineNearTop(range.startLineNumber);
            
            janiDecorations = cssEditor.deltaDecorations(janiDecorations, [
                {
                    range: range,
                    options: {
                        isWholeLine: false,
                        className: 'jani-yellow-bg', 
                        inlineClassName: 'jani-solid-black-text',
                        zIndex: 9999 
                    }
                }
            ]);
        }
    }
};

    htmlEditor.onMouseDown(function (e) {
        if (e.target.position) {
            handleJaniClick(e.target.position);
        }
    });

    htmlEditor.onDidChangeModelContent((e) => {
        if (window.isAutoCompleting) return;

        const change = e.changes[0];
        if (change && change.text === "g") {
            const model = htmlEditor.getModel();
            const position = htmlEditor.getPosition();
            const textBefore = model.getValueInRange({
                startLineNumber: position.lineNumber, startColumn: 1,
                endLineNumber: position.lineNumber, endColumn: position.column
            });

            if (textBefore.match(/class=["']g$/)) {
                window.isAutoCompleting = true;

                const randomPart = Math.random().toString(36).substring(2, 7).toLowerCase();
                const fullClassName = "g" + randomPart + "s";

                htmlEditor.executeEdits("jani-magic", [{
                    range: new monaco.Range(position.lineNumber, position.column, position.lineNumber, position.column),
                    text: randomPart + "s",
                    forceMoveMarkers: true
                }]);

                const htmlLines = model.getLinesContent();
                let currentClassOrder = 0;
                
                for (let i = 0; i < position.lineNumber; i++) {
                    const matches = htmlLines[i].match(/class=["'](g[a-z0-9]+s)["']/g);
                    if (matches) currentClassOrder += matches.length;
                }

                const cssModel = cssEditor.getModel();
                const cssLines = cssModel.getLinesContent();
                let targetLine = cssModel.getLineCount() + 1;
                let foundClasses = 0;

                for (let i = 0; i < cssLines.length; i++) {
                    if (cssLines[i].trim().startsWith('.')) {
                        foundClasses++;
                        if (foundClasses >= currentClassOrder && currentClassOrder !== 0) {
                            targetLine = i + 1;
                            break;
                        }
                    }
                }

                cssEditor.executeEdits("jani-magic", [{
                    range: new monaco.Range(targetLine, 1, targetLine, 1),
                    text: `\n.${fullClassName} {\n    \n}\n`,
                    forceMoveMarkers: true
                }]);

                setTimeout(() => {
                    const clickPos = { lineNumber: position.lineNumber, column: position.column + 1 };
                    htmlEditor.setPosition(clickPos);
                    htmlEditor.focus();
                    handleJaniClick(clickPos);
                    window.isAutoCompleting = false;
                }, 150);
            }
        }
    });
    window.cssEditor = cssEditor;
    window.htmlEditor = htmlEditor;
});

// दोनों विंडोज के लिए वेरिएबल्स 🌸



require(['vs/editor/editor.main'], function () {
    // जब आप HTML बदलें 📝
    htmlEditor.onDidChangeModelContent(() => {
        window.broadcastToLiveView('HTML'); 
    });

    // जब आप CSS बदलें 🎨
    cssEditor.onDidChangeModelContent(() => {
        window.broadcastToLiveView('CSS'); 
    });
});

require(['vs/editor/editor.main'], function () {
    // 🌸 राधिका: सिर्फ एक बार लिस्नर लगाएंगे ताकि लोड न बढ़े
    htmlEditor.onDidChangeModelContent((e) => {
        if (window.isExtracting || window.isAutoCompleting) return;

        const htmlContent = htmlEditor.getValue();
        
        // 🎯 जादू 1: अगर स्टाइल या स्क्रिप्ट टैग अंदर आ गया है (Paste Detection)
        const styleRegex = /<style[^>]*>([\s\S]*?)<\/style>/i;
        const scriptRegex = /<script[^>]*>([\s\S]*?)<\/script>/i;
        
        const sMatch = htmlContent.match(styleRegex);
        const jMatch = htmlContent.match(scriptRegex);

        if (sMatch || jMatch) {
            window.isExtracting = true;
            let cleanHTML = htmlContent;

            // CSS को M1 के CSS Editor में भेजें 🎨
            if (sMatch) {
                const newCSS = sMatch[1].trim();
                cssEditor.setValue(cssEditor.getValue() + "\n\n/* 🌸 Auto-Extracted */\n" + newCSS);
                cleanHTML = cleanHTML.replace(styleRegex, "");
            }

            // JS को सीधा राधिका पैनल (M2) की तिजोरी में भेजें 🚀
            if (jMatch) {
                const newJS = jMatch[1].trim();
                if (window.liveWindow2 && !window.liveWindow2.closed) {
                    window.liveWindow2.postMessage({ type: 'LOAD_OLD_JS', js: newJS }, "*");
                    console.log("%c 🌸 राधिका: JS कोड सुरक्षित भेज दिया गया है! ", "color: #f1c40f; font-weight: bold;");
                }
                cleanHTML = cleanHTML.replace(scriptRegex, "");
            }

            // अंत में HTML को साफ़ करें ✨
            htmlEditor.setValue(cleanHTML.trim());
            
            setTimeout(() => { 
                window.isExtracting = false;
                window.broadcastToLiveView('ALL'); 
            }, 500);
        }
    });
});

require(['vs/editor/editor.main'], function () {
    let titanHistory = [];
    let titanRedoStack = [];
    const maxSteps = 50; 
    let isInternalChange = false;

    function saveTitanSnapshot() {
        if (!htmlEditor || !cssEditor || isInternalChange) return;

        const currentState = {
            html: htmlEditor.getValue(),
            css: cssEditor.getValue()
        };

        if (titanHistory.length > 0) {
            const last = titanHistory[titanHistory.length - 1];
            if (last.html === currentState.html && last.css === currentState.css) return;
        }

        titanHistory.push(currentState);
        if (titanHistory.length > maxSteps) titanHistory.shift();
        titanRedoStack = []; 
    }

    window.triggerUndoJani = function() {
        if (titanHistory.length <= 1) return;
        isInternalChange = true;
        const current = titanHistory.pop();
        titanRedoStack.push(current);
        const prevState = titanHistory[titanHistory.length - 1];
        applySnapshot(prevState);
        isInternalChange = false;
    };

    window.triggerRedoJani = function() {
        if (titanRedoStack.length === 0) return;
        isInternalChange = true;
        const nextState = titanRedoStack.pop();
        titanHistory.push(nextState);
        applySnapshot(nextState);
        isInternalChange = false;
    };

    function applySnapshot(state) {
        htmlEditor.setValue(state.html);
        cssEditor.setValue(state.css);
        broadcastToLiveView(); // SEKIND_MONITAR की जगह Fix ✅
    }

    htmlEditor.onDidChangeModelContent(() => {
        clearTimeout(window.saveTimer);
        window.saveTimer = setTimeout(saveTitanSnapshot, 800);
    });

    cssEditor.onDidChangeModelContent(() => {
        clearTimeout(window.saveTimer);
        window.saveTimer = setTimeout(saveTitanSnapshot, 800);
    });

    const undoBtn = document.querySelector('.fa-undo')?.parentElement;
    const redoBtn = document.querySelector('.fa-redo')?.parentElement;
    
    if(undoBtn) undoBtn.onclick = window.triggerUndoJani;
    if(redoBtn) redoBtn.onclick = window.triggerRedoJani;

    setTimeout(saveTitanSnapshot, 1000);

 window.saveTitanProject = function() {
    if (!htmlEditor || !cssEditor) return;

    // 1. राधिका (M2) को इशारा देना 📢
    if (window.liveWindow2 && !window.liveWindow2.closed) {
        console.log("%c 🌸 राधिका: M1 से इशारा भेजा गया! ", "color: #f39c12; font-weight: bold;");
        window.liveWindow2.postMessage({ type: 'SYNC_SAVE_JS' }, "*");
    } else {
        // अगर खिड़की बंद है तो आपको यहाँ अलर्ट दिखेगा 🚨
        console.error("%c 🌸 राधिका: महेंद्र सिंह जी, M2 की खिड़की खुली नहीं है! ", "color: #e74c3c; font-weight: bold;");
    }

    // 2. HTML और CSS को तुरंत सेव करना 💾
    let currentDB = JSON.parse(localStorage.getItem('jani_titan_db')) || {};
    const projectData = {
        html: htmlEditor.getValue(),
        css: cssEditor.getValue(),
        js: currentDB.js || "", 
        lastSaved: new Date().toLocaleString()
    };
    localStorage.setItem('jani_titan_db', JSON.stringify(projectData));

    // --- बटन का विजुअल फीडबैक ✨ ---
    const saveBtn = document.querySelector('.fa-download').parentElement;
    const originalContent = saveBtn.innerHTML;
    saveBtn.innerHTML = '<i class="fas fa-check-circle" style="color:#2ecc71"></i> HTML/CSS Saved!';
    saveBtn.style.borderColor = "#2ecc71";
    setTimeout(() => {
        saveBtn.innerHTML = originalContent;
        saveBtn.style.borderColor = "#3498db";
    }, 2000);
};

    window.openTitanProject = function() {
        const savedData = localStorage.getItem('jani_titan_db');
        if (savedData) {
            const data = JSON.parse(savedData);
            htmlEditor.setValue(data.html);
            cssEditor.setValue(data.css);
            broadcastToLiveView(); // SEKIND_MONITAR की जगह Fix ✅
        } else {
            alert("Jaani, koi save file nahi mili!");
        }
    };

    const sBtn = document.querySelector('.fa-download')?.parentElement;
    const oBtn = document.querySelector('.fa-folder-open')?.parentElement;
    if(sBtn) sBtn.onclick = window.saveTitanProject;
    if(oBtn) oBtn.onclick = window.openTitanProject;
    
    setTimeout(() => {
        const savedData = localStorage.getItem('jani_titan_db');
        if (savedData) {
            const data = JSON.parse(savedData);
            if (htmlEditor.getValue().trim() === "" || htmlEditor.getValue().includes("Jani God-Mode")) {
                htmlEditor.setValue(data.html);
                cssEditor.setValue(data.css);
                broadcastToLiveView(); // Fix ✅
            }
        }
    }, 1200); 
    
    const gLoader = document.getElementById('titan-global-loader');
    const gFill = document.querySelector('.loader-fill');
    const gText = document.getElementById('load-text');
    const gPercent = document.getElementById('load-percent');

    function updateProgress(percent, text) {
        if(gFill) gFill.style.width = percent + '%';
        if(gPercent) gPercent.innerText = percent + '%';
        if(gText) gText.innerText = text;
    }

    setTimeout(() => updateProgress(30, "BOOTING MONACO ENGINE..."), 300);
    setTimeout(() => updateProgress(60, "FETCHING SAVED DATA..."), 700);

    setTimeout(() => {
        updateProgress(100, "TITAN CORE READY!");
        setTimeout(() => { if(gLoader) gLoader.classList.add('titan-ready'); }, 500);
    }, 1500);

    const tagSettings = {
        'a': { attr: ' href="" class=""', offset: 7 },
        'img': { attr: ' src="" alt="" class=""', offset: 6, self: true },
        'input': { attr: ' type="text" value="" class=""', offset: 7, self: true },
        'link': { attr: ' rel="stylesheet" href=""', offset: 23, self: true },
        'script': { attr: ' src=""', offset: 6 },
        'form': { attr: ' action="" method="POST" class=""', offset: 9 },
        'iframe': { attr: ' src="" frameborder="0"', offset: 6 },
        'audio': { attr: ' src="" controls', offset: 6 },
        'video': { attr: ' src="" controls', offset: 6 },
        'meta': { attr: ' charset="UTF-8"', offset: 10, self: true },
        'source': { attr: ' src="" type=""', offset: 6, self: true },
        'option': { attr: ' value=""', offset: 8 },
        'td': { attr: ' colspan="1" class=""', offset: 10 },
        'th': { attr: ' colspan="1" class=""', offset: 10 },
        'button': { attr: ' type="button" class=""', offset: 7 }
    };

    const selfClosingTags = ['br', 'hr', 'area', 'base', 'col', 'embed', 'param', 'track', 'wbr'];

    htmlEditor.addCommand(monaco.KeyCode.Space, function() {
        const model = htmlEditor.getModel();
        const position = htmlEditor.getPosition();
        const lineContent = model.getLineContent(position.lineNumber);
        const textBeforeCursor = lineContent.substring(0, position.column - 1);
        const match = textBeforeCursor.match(/<([a-zA-Z0-9\-]+)$/);

        if (match) {
            const tagName = match[1].toLowerCase();
            let snippet = "";
            let offset = 8; 
            
            if (tagSettings[tagName]) {
                const config = tagSettings[tagName];
                const closing = config.self ? ">" : `> </${tagName}>`;
                snippet = config.attr + closing;
                offset = config.offset;
            } else if (selfClosingTags.includes(tagName)) {
                snippet = `>`;
                offset = 1;
            } else {
                snippet = ` class=""> </${tagName}>`;
                offset = 8;
            }

            htmlEditor.executeEdits("titan-attr-magic", [{
                range: new monaco.Range(position.lineNumber, position.column, position.lineNumber, position.column),
                text: snippet,
                forceMoveMarkers: true
            }]);

            htmlEditor.setPosition({ lineNumber: position.lineNumber, column: position.column + offset });
        } else {
            htmlEditor.executeEdits("normal-space", [{
                range: new monaco.Range(position.lineNumber, position.column, position.lineNumber, position.column),
                text: " ",
                forceMoveMarkers: true
            }]);
        }
    });
}); 

document.querySelector('.cool-btn i.fa-sync-alt')?.parentElement.addEventListener('click', function() {
    const icon = this.querySelector('i');
    if (icon) {
        icon.style.transition = "transform 0.8s ease";
        icon.style.transform = "rotate(360deg)";
    }

    let html = htmlEditor.getValue();
    let css = cssEditor.getValue();
    const classMap = {};

    const classRegex = /class=["']([^"']+)["']/g;
    let match;
    while ((match = classRegex.exec(html)) !== null) {
        const individualClasses = match[1].split(/\s+/);
        individualClasses.forEach(oldName => {
            const name = oldName.trim();
            if (!name) return;
            const isFontAwesome = name === 'fas' || name === 'far' || name === 'fab' || name.startsWith('fa-');
            const isCoolBtn = name === 'cool-btn';
            if (!isFontAwesome && !isCoolBtn) {
                if (!classMap[name]) classMap[name] = 'g' + Math.random().toString(36).substring(2, 7).toLowerCase() + 's';
            }
        });
    }

    if (Object.keys(classMap).length > 0) {
        Object.keys(classMap).forEach(old => {
            const newName = classMap[old];
            const escapedOld = old.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
            const htmlRegex = new RegExp(`\\b${escapedOld}\\b`, 'g');
            html = html.replace(htmlRegex, newName);
            const cssRegex = new RegExp(`\\.${escapedOld}\\b`, 'g');
            css = css.replace(cssRegex, `.${newName}`);
        });
        window.isExtracting = true;
        htmlEditor.setValue(html);
        cssEditor.setValue(css);
        setTimeout(() => { 
            window.isExtracting = false; 
            if (icon) icon.style.transform = "rotate(0deg)";
        }, 800);
    } else {
        if (icon) icon.style.transform = "rotate(0deg)";
    }
});

document.querySelector('.cool-btn i.fa-wand-magic-sparkles')?.parentElement.addEventListener('click', function() {
    const icon = this.querySelector('i');
    if (icon) {
        icon.classList.add('magic-glow');
        setTimeout(() => icon.classList.remove('magic-glow'), 800);
    }
    if (typeof htmlEditor !== 'undefined') {
        let html = htmlEditor.getValue();
        html = html.replace(/^\s*[\r\n]/gm, ""); 
        htmlEditor.setValue(html);
        htmlEditor.getAction('editor.action.formatDocument').run();
    }
    if (typeof cssEditor !== 'undefined') {
        let css = cssEditor.getValue();
        css = css.replace(/^\s*[\r\n]/gm, ""); 
        cssEditor.setValue(css);
        cssEditor.getAction('editor.action.formatDocument').run();
    }
});

// --- 📡 [M1 Hub Receiver] - Monitor-2 से JS लेकर Monitor-3 को भेजना ---
// --- 📡 [M1 Hub Central Receiver] ---
// --- 📡 [Monitor-1 Hub Receiver] ---

</script>
<script>
/**
 * 🌸 राधिका: महेंद्र सिंह जी, यह M1 (Hub) का 'फाइनल फ़िल्टर' है।
 * हमने डेटा के 'Type' को वही रखा है जिसे M2 पहचानता है। ✨
 */

window.liveWindow2 = null; 
window.liveWindow3 = null; 

const JSMode = document.querySelector('.fas.fa-wand-magic-sparkles').parentElement;

JSMode.onclick = function() {
    const leftPos = -1920; 
    
    // अगर खिड़की बंद है या पहली बार खुल रही है 🚀
    if (window.liveWindow2 === null || window.liveWindow2.closed) {
        // ✨ महेंद्र सिंह जी, यहाँ से '.php' हटा दिया है ताकि Laravel राउट काम करे
        window.liveWindow2 = window.open("/studio/second_monitor", "JaniLiveView_Left", "width=1200,height=800,left=" + leftPos + ",top=0");

        // खिड़की खुलने का इंतज़ार करें और डेटा भेजें ✨🌻
        window.liveWindow2.onload = function() {
            try {
                let savedData = JSON.parse(localStorage.getItem('jani_titan_db')) || {};
                if (savedData.js) {
                    window.liveWindow2.postMessage({ type: 'LOAD_OLD_JS', js: savedData.js }, "*");
                    console.log("🌸 महेंद्र सिंह जी, पुराना JS सफलतापूर्वक लोड कर दिया गया है!");
                }
            } catch (e) {
                console.error("डेटा लोड करने में थोड़ी सी समस्या आई है सर।", e);
            }
        };
    } else {
        window.liveWindow2.focus();
    }
};

let lastProcessedId = ""; 

window.addEventListener('message', function(event) {
    if (event.origin !== "https://greenshop.org.in") return;

    const incoming = event.data;

    // 🔵 रास्ता 1: M2 -> M1 -> M3 (कोड अपडेट)
    if (incoming.type === 'TEST_FROM_M2') {
        if (window.liveWindow3 && !window.liveWindow3.closed) {
            window.liveWindow3.postMessage({ type: 'UPDATE_JS', js: incoming.code }, "*");
        }
    }

    // 🟣 रास्ता 2: M3 -> M1 -> M2 (डेटा फॉरवर्डिंग)
    if (incoming.type === 'M3_CONSOLE_LOG' || incoming.type === 'M3_NETWORK_DATA' || incoming.type === 'M3_ACTIVITY') {
        
        // ✨ फ़िल्टरिंग: कचरा साफ़ करना
        let rawData = incoming.data || incoming.message || "";
        let cleanText = typeof rawData === 'string' 
            ? rawData.replace(/%c/g, '').split('color:')[0].split('font-weight:')[0].trim() 
            : rawData; // ऑब्जेक्ट को स्ट्रिंग न बनाएँ ताकि JSON Tree बने

        // डुप्लीकेट रोकना
        const checkKey = typeof cleanText === 'string' ? cleanText : JSON.stringify(cleanText);
        if (lastProcessedId === checkKey) return; 
        lastProcessedId = checkKey;

        console.log("%c📥 [M3 -> HUB] डेटा मिला, M2 को भेज रही हूँ...", "color: #9b59b6;");

        // 🚀 M2 को वही डेटा फॉरवर्ड करना (बिना Type बदले)
        if (window.liveWindow2 && !window.liveWindow2.closed) {
            window.liveWindow2.postMessage({ 
                type: incoming.type, // ✅ यहाँ बदलाव: 'M3_CONSOLE_LOG' या 'M3_NETWORK_DATA' ही रहेगा
                data: cleanText,
                logType: incoming.logType || 'LOG',
                network: incoming.network || null,
                timestamp: incoming.timestamp || new Date().toLocaleTimeString()
            }, "*");
            console.log("%c📤 [HUB -> M2] डेटा फॉरवर्ड सफल! ✅", "color: #27ae60;");
        }

        setTimeout(() => { lastProcessedId = ""; }, 500);
    }
}, false);
window.addEventListener('message', function(event) {
    // 🛡️ महेंद्र सिंह जी, कभी-कभी डोमेन मैच नहीं होता, इसलिए अभी इसे हटाकर चेक करते हैं
    const incoming = event.data;

    // राधिका (M2) से आने वाले JS पैकेट को लपकना 🎯
    if (incoming && incoming.type === 'JS_FINAL_SAVE') {
        
        // 1. पुरानी तिजोरी खोलें 📂
        let currentData = JSON.parse(localStorage.getItem('jani_titan_db')) || {};

        // 2. राधिका ने जो JS भेजी है, उसे संभालें 📝
        currentData.js = incoming.js;
        currentData.lastSaved = new Date().toLocaleString();

        // 3. अब सब कुछ एक साथ पक्का सेव करें 💾
        localStorage.setItem('jani_titan_db', JSON.stringify(currentData));

        // स्क्रीन पर छोटा सा मैसेज ताकि आपको पता चल जाए ✨
        console.log("%c 🌸 राधिका: सफलता! JS अब तिजोरी (LocalStorage) के अंदर पहुँच चुकी है। ", "background: #2ecc71; color: #fff; padding: 4px; border-radius: 4px;");
    }
});
console.log("🌸 राधिका: महेंद्र सिंह जी, M1 फ़िल्टर अब M2 के साथ सिंक हो गया है! ✅");
</script>
</body>
</html>