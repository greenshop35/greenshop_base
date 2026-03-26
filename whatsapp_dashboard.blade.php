<li class="tree-node" style="list-style: none;">
    <div class="file-item" 
         onclick="{{ $item['type'] === 'folder' ? "toggleFolder('".addslashes($item['full_path'])."', this)" : "openFile('".addslashes($item['full_path'])."')" }}" 
         style="display: flex; align-items: center; gap: 10px; padding: 6px 12px; cursor: pointer; border-bottom: 1px solid #1a1a1a; transition: 0.2s;">
        
        <i class="{{ $item['icon'] }}" style="color:{{ $item['color'] }}; font-size: 14px; width: 16px; text-align: center;"></i>
        
        <div style="overflow: hidden; flex: 1;">
            <span style="display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 13px; color: #eee;">
                {{ $item['name'] }}
            </span>
        </div>

        @if($item['type'] == 'folder')
            <i class="fas fa-chevron-right chevron-icon" style="color: #333; font-size: 8px; transition: 0.3s;"></i>
        @endif
    </div>

    @if($item['type'] == 'folder')
        <ul class="sub-tree" style="list-style: none; padding-left: 15px; display: none; border-left: 1px solid #222; margin-left: 18px;">
            </ul>
    @endif
</li>