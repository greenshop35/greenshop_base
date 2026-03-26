<html lang="hi"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titan Elite - Studio Monitor</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&amp;family=JetBrains+Mono&amp;display=swap" rel="stylesheet">

    <style id="titan-dynamic-styles">/* CSS यहाँ टाइप करें */
.gbox1s {
    background: #4ec9b0;
}</style>

    <style>
        /* [SYSTEM CORE VARIABLES] - No Changes Made */
        :root {
            --studio-bg: #030303;
            --panel-bg: #0a0a0a;
            --accent-primary: #00ff88; 
            --accent-secondary: #00d4ff; 
            --accent-warning: #ff3e3e;
            --border-subtle: rgba(255,255,255,0.05);
            --text-muted: #6b6b6b;
            --glass: rgba(255, 255, 255, 0.02);
        }

        * { 
            margin: 0; padding: 0; box-sizing: border-box; 
            scrollbar-width: thin; scrollbar-color: #333 #000;
        }

        body { 
            background-color: var(--studio-bg); 
            color: #e0e0e0;
            font-family: 'Plus Jakarta Sans', sans-serif; 
            height: 100vh;
            display: flex; 
            flex-direction: column; 
            overflow: hidden;
        }

        nav.titan-nav {
            height: 65px;
            background: var(--panel-bg);
            border-bottom: 1px solid var(--border-subtle);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            z-index: 100;
        }

        .logo-section { display: flex; align-items: center; gap: 12px; }
        .logo-icon {
            width: 32px; height: 32px;
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            border-radius: 8px;
            display: grid; place-items: center;
            color: #000; font-size: 18px;
            box-shadow: 0 0 20px rgba(0, 255, 136, 0.3);
        }
        .logo-text { font-weight: 800; font-size: 16px; letter-spacing: 2px; text-transform: uppercase; }

        .control-hub {
            background: rgba(255,255,255,0.03);
            padding: 5px;
            border-radius: 14px;
            border: 1px solid var(--border-subtle);
            display: flex;
            gap: 5px;
        }

        .hub-btn {
            background: transparent;
            border: none;
            color: var(--text-muted);
            padding: 10px 18px;
            font-size: 11px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            display: flex; align-items: center; gap: 8px;
            transition: all 0.3s ease;
        }

        .hub-btn:hover { color: #fff; background: var(--glass); }
        .hub-btn.active { color: var(--accent-primary); background: rgba(0, 255, 136, 0.08); }

        #workspace {
            display: flex;
            flex: 1;
            overflow: hidden;
            position: relative;
        }

        #stage {
            background: #000;
            position: relative;
            overflow: auto;
            display: flex;
            background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 25px 25px;
            WIDTH: calc(100% - 10px);
        }

        #live-canvas-root {
            width: 1200px; 
            height: 800px; 
            min-height: 50px;
            background: white;
            transition: none; 
        }

        #inspector {
            width: 0;
            background: var(--panel-bg);
            border-left: 1px solid var(--border-subtle);
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
        }

        .inspector-header {
            padding: 25px;
            border-bottom: 1px solid var(--border-subtle);
            display: flex; justify-content: space-between; align-items: center;
        }
        .inspector-header h2 { font-size: 12px; letter-spacing: 2px; color: var(--text-muted); }

        .panel-body {
            padding: 25px;
            display: none;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .status-bar {
            height: 30px;
            background: #050505;
            border-top: 1px solid var(--border-subtle);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 20px;
            font-size: 10px;
            color: var(--text-muted);
            font-family: 'JetBrains Mono';
        }

        .node-badge {
            padding: 2px 8px; background: #111; border-radius: 4px; border: 1px solid #222;
        }
        
        .titan-ruler-top {
            position: absolute; top: 0; left: 25px; right: 0; height: 26px;
            background: #0f0f0f; border-bottom: 1px solid #222;
            display: flex; align-items: flex-end; z-index: 999; overflow: hidden;
            cursor: crosshair;
        }
        .titan-ruler-left {
            position: absolute; top: 22px; left: 0; width: 25px; height: 100%;
            background: #0f0f0f; border-right: 1px solid #222;
            display: flex; flex-direction: column; z-index: 998; overflow: hidden;
            cursor: crosshair;
        }

        .ruler-tick, .v-tick { border-color: #333; position: relative; flex-shrink: 0; pointer-events: none; }
        .ruler-tick { border-left: 1px solid #333; height: 4px; width: 10px; }
        .v-tick { border-top: 1px solid #333; width: 5px; height: 10px; }

        .ruler-tick.major { height: 12px; border-left-color: var(--accent-primary); }
        .v-tick.major { width: 15px; border-top-color: var(--accent-primary); }

        .ruler-tick.major::after, .v-tick.major::after {
            content: attr(data-val); position: absolute; font-size: 8px; 
            color: #777; font-family: 'JetBrains Mono';
        }
        .ruler-tick.major::after { top: -14px; left: 2px; }
        .v-tick.major::after { top: 2px; left: 17px; transform: rotate(-90deg); transform-origin: left top; }

        #width-resizer {
            position: absolute; right: 0; top: 0; width: 10px; height: 100%; 
            background: var(--accent-primary) !important; cursor: ew-resize; z-index: 1000; 
            border-left: 2px solid #000; opacity: 0.8;
        }
        #height-resizer {
            position: absolute; bottom: 0; left: 0; width: 100%; height: 10px; 
            background: var(--accent-secondary) !important; cursor: ns-resize; z-index: 1000; 
            border-top: 2px solid #000; opacity: 0.8;
        }

        #stage { height: calc(100vh - 22px - 65px - 30px); }
    </style>
</head>
<body>

    <nav class="titan-nav">
        <div class="logo-section">
            <div class="logo-icon"><i class="fas fa-atom"></i></div>
            <div class="logo-text">Web View & Controls</div>
        </div>

        <div class="control-hub" style="display: flex; align-items: center; gap: 12px; background: #1a1a1a; padding: 5px 15px; border-radius: 8px; border: 1px solid #333;">
    
    <div class="url-bar-container" style="display: flex; align-items: center; background: #111; border: 1px solid #444; border-radius: 4px; padding: 2px 10px; width: 300px; box-shadow: inset 0 0 5px rgba(0,0,0,0.5);">
        <i class="fas fa-globe" style="color: #3498db; font-size: 12px; margin-right: 8px;"></i>
        <input type="text" id="target-url" placeholder="Enter URL or Path..." 
               style="background: transparent; border: none; color: #eee; font-family: 'JetBrains Mono', monospace; font-size: 11px; width: 100%; outline: none; height: 26px;">
        <i class="fas fa-paper-plane" onclick="fetchExternalSite()" style="color: #2ecc71; cursor: pointer; font-size: 12px; margin-left: 8px;" title="Fetch Now"></i>
    </div>

    <div class="portal-selector-group" style="display: flex; align-items: center; background: #222; border-radius: 4px; padding: 2px; border: 1px solid #444;">
        <select id="portal-route" style="background: transparent; border: none; color: #fff; font-size: 11px; font-family: 'Segoe UI'; padding: 2px 5px; outline: none; cursor: pointer; text-transform: uppercase; font-weight: bold;">
            <option value="customer" style="background: #222;">🛒 Customer</option>
            <option value="business" style="background: #222;">💼 Business</option>
            <option value="delivery" style="background: #222;">🚚 Delivery</option>
            <option value="office" style="background: #222;">🏢 Office</option>
        </select>
    </div>

    <div style="width: 1px; height: 20px; background: #444; margin: 0 5px;"></div>

    <button id="btn-selector" class="hub-btn" onclick="toggleSelectorMode()" style="padding: 5px 12px; font-size: 11px; display: flex; align-items: center; gap: 6px;">
        <i class="fas fa-bullseye" id="selector-icon"></i> 
        <span id="selector-text">LIVE SELECTOR</span>
    </button>
    
    <button id="btn-inspect" class="hub-btn" onclick="togglePanel('inspect')" style="padding: 5px 12px; font-size: 11px;">
        <i class="fas fa-fingerprint"></i> INSPECTOR
    </button>
    
    <button id="btn-layers" class="hub-btn" onclick="togglePanel('layers')" style="padding: 5px 12px; font-size: 11px;">
        <i class="fas fa-layer-group"></i> LAYERS
    </button>
</div>

        <div class="logo-section" style="gap: 20px;">
            <div class="node-badge" style="color: var(--accent-primary)">CORE_STABLE</div>
        </div>
    </nav>

    <main id="workspace">
        <div id="titan-origin-control" style="position:absolute; top:0; left:0; width:25px; height:22px; background:#111; z-index:1005; border-right:1px solid #333; border-bottom:1px solid #333; display:flex; flex-direction:column; overflow:hidden;">
            <input type="number" id="quick-w" value="1200" title="Canvas Width" oninput="quickResize()" style="height:11px; width:100%; background:transparent; border:none; color:var(--accent-primary); font-size:7px; font-family:'JetBrains Mono'; outline:none; text-align:center;">
            <input type="number" id="quick-h" value="800" title="Canvas Height" oninput="quickResize()" style="height:11px; width:100%; background:transparent; border:none; color:var(--accent-secondary); font-size:7px; font-family:'JetBrains Mono'; outline:none; text-align:center; border-top:1px solid #222;">
        </div>

        <div id="top-ruler" class="titan-ruler-top"><div class="ruler-tick major" data-val="0"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="100"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="200"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="300"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="400"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="500"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="600"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="700"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="800"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="900"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="1000"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="1100"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="1200"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="1300"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="1400"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="1500"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="1600"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="1700"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="1800"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="1900"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="2000"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="2100"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="2200"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="2300"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="2400"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="2500"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="2600"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="2700"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="2800"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="2900"></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick " data-val=""></div><div class="ruler-tick major" data-val="3000"></div>
            <div id="width-resizer" style="left: 1200px; position:absolute;"></div>
        </div>

        <div id="left-ruler" class="titan-ruler-left"><div class="v-tick major" data-val="0"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="100"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="200"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="300"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="400"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="500"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="600"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="700"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="800"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="900"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="1000"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="1100"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="1200"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="1300"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="1400"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="1500"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="1600"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="1700"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="1800"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="1900"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="2000"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="2100"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="2200"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="2300"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="2400"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="2500"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="2600"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="2700"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="2800"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="2900"></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick " data-val=""></div><div class="v-tick major" data-val="3000"></div>
            <div id="height-resizer" style="top: 800px; position:absolute;"></div>
        </div>
        
        <section id="stage" style="padding-top:27px; padding-left:25px;">
            <div id="live-canvas-root">
<div class="gbox1s">
    <h1>Jani God-Mode</h1>
</div></div>
        </section>

        <aside id="inspector">
            <div class="inspector-header">
                <h2 id="panel-title">INSPECTOR</h2>
                <i class="fas fa-times" onclick="closeInspector()" style="cursor:pointer; font-size:12px;"></i>
            </div>
            <div id="panel-inspect" class="panel-body">
                <small style="color:var(--accent-primary)">SYSTEM_STATUS</small>
                <p style="font-size: 13px; margin-top: 8px;">Waiting for element selection...</p>
            </div>
        </aside>
    </main>

    <footer class="status-bar">
        <div><span><i class="fas fa-database"></i> SYNC_READY</span></div>
        <div><span>MODE: PRODUCTION</span></div>
    </footer>
<script>
/**
 * 🌸 राधिका: महेंद्र सिंह जी, अब फाइल भेजने का लॉजिक इसी कोड के अंदर समा गया है! ✨
 */

document.addEventListener('DOMContentLoaded', () => {
    const portalSelect = document.getElementById('portal-route');
    const urlInput = document.getElementById('target-url');

    const savedPortal = localStorage.getItem('titan_last_portal');
    const savedPath = localStorage.getItem('titan_last_path');

    if (savedPortal && portalSelect) portalSelect.value = savedPortal;
    if (savedPath && urlInput) urlInput.value = savedPath;

    if (portalSelect) {
        portalSelect.addEventListener('change', () => {
            console.log("🌸 पोर्टल बदला गया है, नया डेटा ला रही हूँ...");
            window.fetchExternalSite(); 
        });
    }

    if (savedPortal || savedPath) {
        window.fetchExternalSite();
    }
});

window.fetchExternalSite = async function() {
    const root = document.getElementById('live-canvas-root');
    const urlInput = document.getElementById('target-url');
    const portalSelect = document.getElementById('portal-route');

    if (!urlInput || !portalSelect || !root) return;

    const inputPath = urlInput.value.trim();
    const portal = portalSelect.value;

    localStorage.setItem('titan_last_portal', portal);
    localStorage.setItem('titan_last_path', inputPath);

    let finalPath = "/";
    if (portal !== 'customer') finalPath += portal;
    
    if (inputPath) {
        let separator = (finalPath === "/" || finalPath.endsWith('/') || inputPath.startsWith('/')) ? "" : "/";
        finalPath += separator + inputPath;
    }

    try {
        console.log(`📡 Smart Fetching & Full Path Mapping: ${finalPath}`);
        const response = await fetch(finalPath);
        if (!response.ok) throw new Error(`Status: ${response.status}`);

        let html = await response.text();

        // 1. मैपिंग डेटा से 'Full Path Dictionary' तैयार करना 📋✨
        const mappingMatches = [...html.matchAll(/Mapping:\s*([a-f0-9]+\.php)\s*==>\s*📂\s*(.*?)(?='|\s*<\/script>)/g)];
        const fileDictionary = {};
        let mainViewFile = null; 

        mappingMatches.forEach((match, index) => {
            const hashName = match[1].trim();
            const fullPath = match[2].trim();
            fileDictionary[hashName] = fullPath; 
            
            // पहली फाइल को मुख्य फाइल मानना ✨
            if (index === 0) mainViewFile = fullPath;
        });

        // 2. HTML से मैपिंग वाली फालतू स्क्रिप्ट्स हटाना (सफाई) 🧹
        const cleanHtml = html.replace(/<script\b[^>]*>[\s\S]*?Mapping:[\s\S]*?<\/script>/gi, "");

        const parser = new DOMParser();
        const doc = parser.parseFromString(cleanHtml, 'text/html');

        // 3. [ओरिजिनल लॉजिक: Hash को Full Path में बदलना] ✨🔄
        doc.querySelectorAll('[data-view]').forEach(el => {
            const rawViewValue = el.getAttribute('data-view');
            const currentHash = rawViewValue.split('/').pop(); 

            if (fileDictionary[currentHash]) {
                el.setAttribute('data-view', fileDictionary[currentHash]);
                el.style.outline = "1px dashed rgba(0, 255, 127, 0.4)"; 
            }
        });

        root.innerHTML = doc.body.innerHTML;

        // 🚀 [महेंद्र सिंह जी, यहाँ से फाइल सीधे मॉनिटर पर जा रही है] ✨🌸
        // किसी अलग फंक्शन की ज़रूरत नहीं, सीधे postMessage का इस्तेमाल! 🎖️
        if (mainViewFile && window.opener && !window.opener.closed) {
            window.opener.postMessage({
                type: 'M3_VIEW_DATA', 
                view: {
                    fullPath: mainViewFile,
                    fileName: mainViewFile.split('/').pop()
                },
                timestamp: new Date().toLocaleTimeString()
            }, "https://greenshop.org.in");

            console.log(`✅ ${portal.toUpperCase()} की मुख्य फाइल मॉनिटर पर रवाना हो गई है! 🌸`);
        }

    } catch (error) {
        console.error("❌ Fetch Error:", error);
        root.innerHTML = `<div style="color:red; padding:20px;">❌ एरर: ${error.message} 🌸</div>`;
    }
};
</script>
<script>
/**
 * 🌸 राधिका: महेंद्र सिंह जी, यह 'LIVE SELECTOR' का असली स्विच है। ✨
 */
window.isSelectorActive = false; 

// 🛑 राधिका: महेंद्र सिंह जी, यह फंक्शन मोड को बंद करने के लिए जरूरी है ✨
window.stopInspector = function() {
    window.isSelectorActive = false;
    const btn = document.getElementById('btn-selector');
    const icon = document.getElementById('selector-icon');
    const text = document.getElementById('selector-text');

    if (btn) {
        btn.style.background = ""; 
        btn.style.color = "";
        btn.style.borderColor = "";
        btn.style.boxShadow = "none";
    }
    if (icon) icon.className = "fas fa-bullseye";
    if (text) text.innerText = "LIVE SELECTOR";

    document.querySelectorAll('.jani-hover-active').forEach(el => {
        el.style.outline = "none";
        el.classList.remove('jani-hover-active');
    });
    document.querySelectorAll('.jani-inspect-overlay').forEach(el => el.remove());
};

window.toggleSelectorMode = function() {
    const btn = document.getElementById('btn-selector');
    const icon = document.getElementById('selector-icon');
    const text = document.getElementById('selector-text');

    window.isSelectorActive = !window.isSelectorActive;

    if (window.isSelectorActive) {
        btn.style.background = "#2980b9"; 
        btn.style.color = "#ffffff";
        btn.style.borderColor = "#3498db";
        btn.style.boxShadow = "0 0 15px rgba(52, 152, 219, 0.6)";
        
        if(icon) icon.className = "fas fa-crosshairs fa-spin"; 
        if(text) text.innerText = "SELECTOR: ON";
    } else {
        window.stopInspector(); // यहाँ स्टॉप फंक्शन कॉल होगा
    }
};

document.addEventListener('mouseover', function(e) {
    if (!window.isSelectorActive) return;

    const root = document.getElementById('live-canvas-root');
    const target = e.target;

    if (!root || !root.contains(target) || target === root) return;

    document.querySelectorAll('.jani-hover-active').forEach(el => {
        el.style.outline = "none";
        el.classList.remove('jani-hover-active');
    });
    document.querySelectorAll('.jani-inspect-overlay').forEach(el => el.remove());

    target.classList.add('jani-hover-active');
    
    const rect = target.getBoundingClientRect();
    const style = window.getComputedStyle(target);

    const padding = {
        top: parseFloat(style.paddingTop),
        right: parseFloat(style.paddingRight),
        bottom: parseFloat(style.paddingBottom),
        left: parseFloat(style.paddingLeft)
    };
    const margin = {
        top: parseFloat(style.marginTop),
        right: parseFloat(style.marginRight),
        bottom: parseFloat(style.marginBottom),
        left: parseFloat(style.marginLeft)
    };

    const marginOverlay = document.createElement('div');
    marginOverlay.className = 'jani-inspect-overlay';
    marginOverlay.style = `
        position: absolute;
        pointer-events: none;
        z-index: 9998;
        top: ${rect.top + window.scrollY - margin.top}px;
        left: ${rect.left + window.scrollX - margin.left}px;
        width: ${rect.width + margin.left + margin.right}px;
        height: ${rect.height + margin.top + margin.bottom}px;
        background: rgba(230, 126, 34, 0.3);
        border: 1px dashed #e67e22;
    `;
    document.body.appendChild(marginOverlay);

    const overlay = document.createElement('div');
    overlay.className = 'jani-inspect-overlay';
    overlay.style = `
        position: absolute;
        pointer-events: none;
        z-index: 9999;
        top: ${rect.top + window.scrollY}px;
        left: ${rect.left + window.scrollX}px;
        width: ${rect.width}px;
        height: ${rect.height}px;
        border: 1px solid #3498db;
        background-color: rgba(52, 152, 219, 0.1);
        box-shadow: inset 0 0 0 ${padding.top}px rgba(46, 204, 113, 0.3), 
                    inset -${padding.right}px 0 0 0 rgba(46, 204, 113, 0.3), 
                    inset 0 -${padding.bottom}px 0 0 rgba(46, 204, 113, 0.3), 
                    inset ${padding.left}px 0 0 0 rgba(46, 204, 113, 0.3);
    `;
    document.body.appendChild(overlay);

    const infoCard = document.createElement('div');
    infoCard.className = 'jani-inspect-overlay';

    const cardHeight = 180; 
    const cardWidth = 220; 
    const cardGap = 15; 
    
    let finalTop = (rect.top > cardHeight + cardGap) 
        ? (rect.top + window.scrollY - cardHeight - cardGap) 
        : (rect.bottom + window.scrollY + cardGap); 

    let finalLeft = rect.left + window.scrollX;

    if (finalLeft + cardWidth > window.innerWidth + window.scrollX - 20) {
        finalLeft = window.innerWidth + window.scrollX - cardWidth - 20;
    }
    if (finalLeft < window.scrollX + 20) {
        finalLeft = window.scrollX + 20;
    }

    Object.assign(infoCard.style, {
        position: 'absolute',
        zIndex: '10005',
        background: '#ffffff',
        color: '#333333',
        padding: '12px',
        borderRadius: '6px',
        boxShadow: '0 8px 25px rgba(0,0,0,0.2)',
        fontFamily: "'Segoe UI', Roboto, sans-serif",
        fontSize: '12px',
        width: `${cardWidth}px`,
        top: `${finalTop}px`,
        left: `${finalLeft}px`,
        pointerEvents: 'none',
        borderTop: '5px solid #3498db',
        lineHeight: '1.4'
    });

    const metrics = {
        tagName: target.tagName.toLowerCase(),
        idName: target.id ? `#${target.id}` : 'no-id',
        className: target.className ? `.${target.className.split(' ').join('.')}` : 'no-class',
        color: rgbToHex(style.color),
        font: `${style.fontSize} ${style.fontFamily.split(',')[0]}`,
        padding: style.padding,
        margin: style.margin,
        display: style.display,
        position: style.position,
        zIndex: style.zIndex === 'auto' ? '0' : style.zIndex,
        size: `${Math.round(rect.width)} × ${Math.round(rect.height)}`,
        role: target.getAttribute('role') || 'generic',
        bgColor: rgbToHex(style.backgroundColor),
        bgImage: style.backgroundImage !== 'none' ? 'URL Active' : 'None'
    };

    infoCard.innerHTML = `
        <div style="margin-bottom:8px; border-bottom:1px solid #eee; padding-bottom:5px;">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <strong style="color:#881280; font-size:14px;">${metrics.tagName}</strong>
                <span style="color:#666; font-size:11px;">${metrics.size}</span>
            </div>
            <div style="font-size:13px; margin-top:3px; word-break:break-all;">
                <span style="color:#c41a16;">${metrics.idName}</span>
                <span style="color:#1c00cf;">${metrics.className}</span>
            </div>
        </div>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:5px; margin-bottom:8px; font-size:11px;">
            <div><span style="color:#777;">Display:</span> <span style="font-weight:bold;">${metrics.display}</span></div>
            <div><span style="color:#777;">Pos:</span> <span style="font-weight:bold;">${metrics.position}</span></div>
            <div><span style="color:#777;">Z-Index:</span> <span style="color:#e74c3c; font-weight:bold;">${metrics.zIndex}</span></div>
            <div><span style="color:#777;">Color:</span> <span style="display:inline-block; width:8px; height:8px; background:${metrics.color}; border-radius:50%; margin-right:3px;"></span>${metrics.color.toUpperCase()}</div>
        </div>
        <div style="background:#f9f9f9; padding:6px; border-radius:4px; margin-bottom:8px; border:1px solid #eee; font-size:11px;">
            <div style="margin-bottom:3px;"><span style="color:#777;">BG Color:</span> <span style="display:inline-block; width:8px; height:8px; background:${metrics.bgColor}; border-radius:2px; border:1px solid #ddd; margin-right:3px;"></span><span style="font-weight:500;">${metrics.bgColor.toUpperCase()}</span></div>
            <div><span style="color:#777;">BG Image:</span> <span style="color:${metrics.bgImage === 'None' ? '#999' : '#3498db'}; font-weight:500;">${metrics.bgImage}</span></div>
        </div>
        <div style="margin-bottom:4px; font-size:11px;"><span style="color:#777;">Font:</span> ${metrics.font}</div>
        <div style="margin-top:8px; background:#f0f7ff; padding:5px; border-radius:3px; display:flex; justify-content:space-around; font-size:10px; border:1px solid #d0e7ff;">
            <div><span style="color:#e67e22; font-weight:bold;">M:</span> ${metrics.margin}</div>
            <div><span style="color:#2ecc71; font-weight:bold;">P:</span> ${metrics.padding}</div>
        </div>
        <hr style="border:0; border-top:1px solid #eee; margin:8px 0;">
        <div style="display:flex; justify-content:space-between; font-size:11px;">
            <span style="color:#777;">Role</span>
            <span style="color:#333;">${metrics.role}</span>
        </div>
    `;
    document.body.appendChild(infoCard);

    function rgbToHex(rgb) {
        if (!rgb) return "#000000";
        const res = rgb.match(/\d+/g);
        if (!res) return rgb;
        return "#" + res.slice(0, 3).map(x => {
            const hex = parseInt(x).toString(16);
            return hex.length === 1 ? "0" + hex : hex;
        }).join("");
    }
}, true);

// 🖱️ [M1 Data Transfer] - महेंद्र सिंह जी, यहाँ वेरिएबल ठीक कर दिया है ✨
document.addEventListener('click', function(e) {
    if (window.isSelectorActive) { 
        e.preventDefault(); 
        e.stopPropagation();

        const target = e.target;
        
        // 🌸 1. क्लास और टैग की पहचान करना
        const rawClass = target.className ? target.className.replace('jani-hover-active', '').trim().split(/\s+/)[0] : '';
        const selector = rawClass ? `.${rawClass}` : target.tagName.toLowerCase();

        // 🎯 2. महेंद्र सिंह जी, यहाँ असली जादू है (Index निकालना) ✨
        // यह उसी क्लास/टैग के सभी एलिमेंट्स को ढूँढेगा और आपके वाले का नंबर (Index) निकालेगा
        const allMatches = Array.from(document.querySelectorAll(selector));
        const elementIndex = allMatches.indexOf(target);

        // 📡 3. डेटा तैयार करना
        const messageData = {
            type: 'RSW_SELECTOR_DATA',
            id: target.id ? target.id : '', // बिना # के भेजें, Hub खुद संभाल लेगा
            css_class: rawClass,
            tagName: target.tagName.toLowerCase(),
            index: elementIndex // ✨ यह है वो 'Satik' नंबर!
        };

        // 🚀 डेटा को M1 (Opener) को भेजना
        if (window.opener) {
            window.opener.postMessage(messageData, "*"); 
        }

        console.log(`🌸 RSW: ${selector} (Index: ${elementIndex}) भेज दिया गया है!`);
        
        if (typeof window.stopInspector === 'function') {
            window.stopInspector();
        }
        
        // सर, अब अलर्ट की जगह छोटा सा कन्फर्मेशन दे सकते हैं 😊
        console.log("महेंद्र सिंह जी, सटीक डेटा पहुँच गया है! 🌸✨");
    }
}, true);

document.addEventListener('mouseout', function(e) {
    if (!window.isSelectorActive) return;
    document.querySelectorAll('.jani-inspect-overlay').forEach(el => el.remove());
    if (e.target.style) e.target.style.outline = "none";
}, true);
</script>
   <script>
    const ins = document.getElementById('inspector');
    const btns = document.querySelectorAll('.hub-btn');
    const panels = document.querySelectorAll('.panel-body');

    // 🚀 [TITAN UPDATE ENGINE] - महेंद्र सिंह जी, आपका ओरिजिनल लॉजिक एकदम वही है
  window.updateTitanContent = function(html, css, js) {
    // 1. HTML और CSS की अपडेट 🏠
    const root = document.getElementById('live-canvas-root');
    if(root && html != null && root.innerHTML !== html) {
        root.innerHTML = html; 
    }
    const styleTag = document.getElementById('titan-dynamic-styles');
    if(styleTag && css != null) {
        styleTag.innerHTML = css;
    }

    // 2. ⚡ JS मेमोरी की सफाई 🌸
    const oldScript = document.getElementById('runtime-script');
    if(oldScript) {
        oldScript.remove(); 
        
        // पुरानी यादें मिटाना (ग्लोबल फंक्शन्स)
        Object.keys(window).forEach(key => {
            if (typeof window[key] === 'function' && !window[key].toString().includes('[native code]')) {
                try { delete window[key]; } catch(e) { window[key] = undefined; } 
            }
        });
    }

    // 3. 💉 नया शुद्ध कोड डालना (WITH BLOCK SCOPE)
    if (js && js.trim().length > 0) {
        try {
            const newScript = document.createElement('script');
            newScript.id = 'runtime-script';
            
            /** * 🌸 महेंद्र सिंह जी, यहाँ हमने 'Block Scope' { ... } और 
             * 'IIFE' (Self-Executing Function) का उपयोग किया है।
             * इससे पुराने 'const' और 'let' वेरिएबल नए कोड को परेशान नहीं करेंगे।
             */
            newScript.text = `(function() { 
                try { 
                    ${js} 
                } catch(e) { console.error("Runtime Error:", e); }
            })();`; 

            document.body.appendChild(newScript);
        } catch(err) {
            console.error("Script Injection Error:", err);
        }
    }
};

    // --- आपके ओरिजिनल फंक्शन्स (इनमें कोई बदलाव नहीं किया है) --- 🌸
    function togglePanel(type) {
        const pTitle = document.getElementById('panel-title');
        const targetPanel = document.getElementById('panel-' + type);
        if(!targetPanel) return;
        
        if(ins.style.width === '350px' && targetPanel.style.display === 'block') {
            closeInspector(); return;
        }
        ins.style.width = '350px';
        const allPanels = document.querySelectorAll('.panel-body');
        const allBtns = document.querySelectorAll('.hub-btn');
        allPanels.forEach(p => p.style.display = 'none');
        allBtns.forEach(b => b.classList.remove('active'));
        
        targetPanel.style.display = 'block';
        if(document.getElementById('btn-' + type)) document.getElementById('btn-' + type).classList.add('active');
        pTitle.innerText = type.toUpperCase() + '_ENGINE';
    }

    function closeInspector() {
        ins.style.width = '0';
        const allBtns = document.querySelectorAll('.hub-btn');
        allBtns.forEach(b => b.classList.remove('active'));
    }

    function buildTitanRulers() {
        const topR = document.getElementById('top-ruler');
        const leftR = document.getElementById('left-ruler');
        if (topR) {
            let hTicks = '';
            for (let i = 0; i <= 3000; i += 10) {
                let cls = (i % 100 === 0) ? 'major' : '';
                let val = (i % 100 === 0) ? i : '';
                hTicks += '<div class="ruler-tick ' + cls + '" data-val="' + val + '"></div>';
            }
            topR.insertAdjacentHTML('afterbegin', hTicks);
        }
        if (leftR) {
            let vTicks = '';
            for (let j = 0; j <= 3000; j += 10) {
                let vCls = (j % 100 === 0) ? 'major' : '';
                let vVal = (j % 100 === 0) ? j : '';
                vTicks += '<div class="v-tick ' + vCls + '" data-val="' + vVal + '"></div>';
            }
            leftR.insertAdjacentHTML('afterbegin', vTicks);
        }
    }

    function initTitanResizer() {
        const canvas = document.getElementById('live-canvas-root');
        const stage = document.getElementById('stage');
        const qw = document.getElementById('quick-w');
        const qh = document.getElementById('quick-h');
        const wBtn = document.getElementById('width-resizer');
        const hBtn = document.getElementById('height-resizer');
        const tRuler = document.getElementById('top-ruler');
        const lRuler = document.getElementById('left-ruler');

        let isResizing = null;

        function applyResize(e, type) {
            const rect = stage.getBoundingClientRect();
            if (type === 'w') {
                let newW = Math.round(e.clientX - rect.left + stage.scrollLeft - 25);
                if (newW > 20) {
                    canvas.style.width = newW + 'px';
                    wBtn.style.left = newW + 'px';
                    if (qw) qw.value = newW;
                }
            } else if (type === 'h') {
                let newH = Math.round(e.clientY - rect.top + stage.scrollTop - 22);
                if (newH > 20) {
                    canvas.style.height = newH + 'px';
                    hBtn.style.top = newH + 'px';
                    if (qh) qh.value = newH;
                }
            }
        }

        tRuler.addEventListener('mousedown', (e) => { isResizing = 'w'; applyResize(e, 'w'); });
        lRuler.addEventListener('mousedown', (e) => { isResizing = 'h'; applyResize(e, 'h'); });
        window.addEventListener('mousemove', (e) => { if (!isResizing) return; applyResize(e, isResizing); });
        window.addEventListener('mouseup', () => { isResizing = null; });

        window.quickResize = function() {
            if(qw && qh) {
                canvas.style.width = qw.value + 'px';
                canvas.style.height = qh.value + 'px';
                wBtn.style.left = qw.value + 'px';
                hBtn.style.top = qh.value + 'px';
            }
        };
    }

    setTimeout(() => {
        buildTitanRulers();
        initTitanResizer();
    }, 150);

    // 📡 [TITAN DIRECT RECEIVER] - जानी, हमने सिर्फ यहाँ बदलाव किया है! ✨
   // --- 📡 [TITAN MONITOR-3 FINAL RECEIVER] - महेंद्र सिंह जी, इसे अपडेट कर दिया है ---
window.addEventListener('message', (event) => {
/**
 * 📡 [TITAN DIRECT RECEIVER] - महेंद्र सिंह जी, इसे अभी के लिए रोक दिया गया है। ✨
 * अब M1 से आने वाला HTML/CSS/JS आपके फेच किए हुए डेटा को नहीं बदलेगा।
 */
/* window.addEventListener('message', (event) => {
    const data = event.data;
    
    // 1. अगर Monitor-1 से HTML और CSS आए 🎨 🌸
    if (data.type === 'UPDATE_UI') {
        updateTitanContent(data.html, data.css, null);
    } 
    
    // 2. JS वाला लॉजिक ⚡ 🚀
    else if (data.type === 'UPDATE_JS') {
        let rawJS = data.js;
        updateTitanContent(null, null, rawJS);
    }
});
*/

console.log("🌸 राधिका: महेंद्र सिंह जी, M1 रिसीवर को 'Comment Out' कर दिया गया है। अब आप सुकून से URL फेचिंग टेस्ट कर सकते हैं! ✨");
});
</script>
<script>
/**
 * 🌸 महेंद्र सिंह जी, यह आपका 'Split Path' हब है।
 * यहाँ से Console और Network का डेटा अलग-अलग रास्तों से जाएगा। ✨
 */
if (!window.__RADHIKA_HUB__) {
    window.__RADHIKA_HUB__ = function(payload, type, isNetwork = false) {
        if (window.opener && !window.opener.closed) {
            
            // 📡 रास्ता 1: केवल नेटवर्क टैब के लिए (M3_NETWORK_DATA)
            if (isNetwork) {
                window.opener.postMessage({
                    type: 'M3_NETWORK_DATA', // अलग पहचान
                    network: {
                        requestUrl: payload.url || window.location.href,
                        method: payload.method || "POST",
                        type: payload.type || "fetch"
                    },
                    data: payload.data || payload,
                    timestamp: new Date().toLocaleTimeString()
                }, "https://greenshop.org.in");
            } 
            // 💻 रास्ता 2: केवल कंसोल टैब के लिए (M3_CONSOLE_LOG)
            else {
                window.opener.postMessage({
                    type: 'M3_CONSOLE_LOG', // अलग पहचान
                    logType: type || 'LOG',
                    data: payload,
                    timestamp: new Date().toLocaleTimeString()
                }, "https://greenshop.org.in");
            }
            return true;
        }
        return false;
    };
    
    Object.defineProperty(window, '__RADHIKA_HUB__', { enumerable: false });
}

/**
 * 🛡️ सुपर कंसोल हुक: यह केवल कंसोल टैब के रास्ते पर चलेगा
 */
(function safeHook() {
    if (console.log.isSafe) return;
    const _REAL = console.log;
    
    console.log = function(...args) {
        _REAL.apply(console, args);
        
        const msg = args.length === 1 && typeof args[0] === 'object' 
                    ? args[0] 
                    : args.map(a => typeof a === 'object' ? JSON.stringify(a) : String(a)).join(' ');
        
        if (typeof window.__RADHIKA_HUB__ === 'function') {
            // महेंद्र सिंह जी, यहाँ 'false' का मतलब है - सिर्फ कंसोल में जाओ! 😊
            window.__RADHIKA_HUB__(msg, 'LOG', false);
        }
    };
    console.log.isSafe = true;
})();
</script>
</body></html>