<?php
$db = new mysqli('localhost', 'root', '', 'websitecmsactivity');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$defaultValues = [
    'navbar_bg_color' => 'transparent',
    'navbar_scrolled_bg_color' => 'black',
    'navbar_padding' => '15px 20px',
    'hero_text_color' => 'white',
    'hero_text_position' => 'center',
    'info_section_bg_color' => '#1e1e1e',
    'info_box_bg_color' => 'black',
    'info_box_text_color' => 'white',
    'highlight_bg_color' => 'white',
    'highlight_text_color' => '#333',
    'news_section_bg_color' => 'white',
    'news_text_color' => '#333',
    'research_title_bg_color' => '#333',
    'research_title_text_color' => 'white',
    'event_card_bg_color' => 'transparent',
    'event_text_color' => '#333',
    'footer_bg_color' => '#333',
    'footer_text_color' => 'white',
    'link_hover_color' => '#f4c542',
    'border_radius' => '8px'
];

if (isset($_POST['reset_defaults'])) {
    foreach ($defaultValues as $name => $value) {
        $stmt = $db->prepare("UPDATE design_settings SET setting_value = ? WHERE setting_name = ?");
        $stmt->bind_param("ss", $value, $name);
        $stmt->execute();
        $stmt->close();
    }
    $success = "Settings reset to default values successfully!";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_settings'])) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'setting_') === 0) {
            $id = substr($key, 8);
            $stmt = $db->prepare("UPDATE design_settings SET setting_value = ? WHERE id = ?");
            $stmt->bind_param("si", $value, $id);
            $stmt->execute();
            $stmt->close();
        }
    }
    $success = "Settings updated successfully!";
}

$settings = [];
$result = $db->query("SELECT * FROM design_settings");
while ($row = $result->fetch_assoc()) {
    $settings[] = $row;
}

$presetOptions = [
    'navbar_bg_color' => ['transparent', '#ffffff', '#1e1e1e', '#2c3e50', '#3498db'],
    'navbar_scrolled_bg_color' => ['black', '#2c3e50', '#1a1a1a', '#3498db', '#e74c3c'],
    'navbar_padding' => ['15px 20px', '10px 15px', '20px 25px', '5px 10px', '25px 30px'],
    'hero_text_color' => ['white', 'black', '#333333', '#f1c40f', '#e74c3c'],
    'hero_text_position' => ['center', 'left', 'right'],
    'info_section_bg_color' => ['#1e1e1e', '#f7f7f7', '#2c3e50', '#3498db', '#ecf0f1'],
    'info_box_bg_color' => ['black', 'white', '#3498db', '#e74c3c', '#2ecc71'],
    'info_box_text_color' => ['white', 'black', '#333333', '#f1c40f', '#e74c3c'],
    'highlight_bg_color' => ['white', '#f7f7f7', '#ecf0f1', '#3498db', '#e74c3c'],
    'highlight_text_color' => ['#333', '#ffffff', '#2c3e50', '#3498db', '#e74c3c'],
    'news_section_bg_color' => ['white', '#f7f7f7', '#ecf0f1', '#1e1e1e', '#2c3e50'],
    'news_text_color' => ['#333', '#ffffff', '#2c3e50', '#3498db', '#e74c3c'],
    'research_title_bg_color' => ['#333', '#2c3e50', '#1e1e1e', '#3498db', '#e74c3c'],
    'research_title_text_color' => ['white', 'black', '#f1c40f', '#e74c3c', '#2ecc71'],
    'event_card_bg_color' => ['transparent', 'white', '#f7f7f7', '#3498db', '#e74c3c'],
    'event_text_color' => ['#333', '#ffffff', '#2c3e50', '#3498db', '#e74c3c'],
    'footer_bg_color' => ['#333', '#2c3e50', '#1e1e1e', '#3498db', '#e74c3c'],
    'footer_text_color' => ['white', 'black', '#f1c40f', '#e74c3c', '#2ecc71'],
    'link_hover_color' => ['#f4c542', '#3498db', '#e74c3c', '#2ecc71', '#9b59b6'],
    'border_radius' => ['8px', '4px', '12px', '16px', '0px']
];

$currentMode = $_COOKIE['admin_theme'] ?? 'light';
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php echo $currentMode; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Settings Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --danger: #f72585;
            --danger-dark: #e5177b;
            --success: #4cc9f0;
            --warning: #f4c542;
            --text: #2b2d42;
            --text-light: #8d99ae;
            --bg: #f8f9fa;
            --card-bg: #ffffff;
            --border: #e9ecef;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        [data-theme="dark"] {
            --primary: #4895ef;
            --primary-dark: #3a7bd4;
            --danger: #f72585;
            --success: #4cc9f0;
            --warning: #f4c542;
            --text: #f8f9fa;
            --text-light: #adb5bd;
            --bg: #121212;
            --card-bg: #1e1e1e;
            --border: #333333;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            transition: var(--transition);
            min-height: 100vh;
            padding: 20px;
        }

        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border);
        }

        .admin-title {
            font-size: 28px;
            font-weight: 600;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-title i {
            font-size: 24px;
        }

        .theme-toggle {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .toggle-label {
            font-weight: 500;
            font-size: 14px;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--border);
            transition: var(--transition);
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: var(--card-bg);
            transition: var(--transition);
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--primary);
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: fadeIn 0.5s ease-out;
        }

        .alert-success {
            background-color: rgba(76, 201, 240, 0.1);
            border-left: 4px solid var(--success);
            color: var(--success);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .settings-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 30px;
            margin-bottom: 30px;
            transition: var(--transition);
        }

        .settings-card:hover {
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border);
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            font-size: 18px;
        }

        .settings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .setting-item {
            margin-bottom: 20px;
        }

        .setting-item label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
            color: var(--text-light);
        }

        .setting-item input[type="text"],
        .setting-item select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background-color: var(--card-bg);
            color: var(--text);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: var(--transition);
        }

        .setting-item input[type="text"]:focus,
        .setting-item select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .color-picker {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .color-picker select {
            flex: 1;
        }

        .color-picker input[type="color"] {
            width: 40px;
            height: 40px;
            padding: 0;
            border: 1px solid var(--border);
            border-radius: 8px;
            cursor: pointer;
            background: var(--card-bg);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: var(--danger-dark);
            transform: translateY(-2px);
        }

        .btn i {
            font-size: 14px;
        }

        .category-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            margin-left: 10px;
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }

        @media (max-width: 768px) {
            .settings-grid {
                grid-template-columns: 1fr;
            }
            
            .admin-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1 class="admin-title">
                <i class="fas fa-palette"></i>
                Design Settings Dashboard
            </h1>
            <div class="theme-toggle">
                <span class="toggle-label"><?php echo ucfirst($currentMode); ?> Mode</span>
                <label class="toggle-switch">
                    <input type="checkbox" id="theme-toggle" <?php echo $currentMode === 'dark' ? 'checked' : ''; ?>>
                    <span class="slider"></span>
                </label>
            </div>
        </header>

        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form method="POST" id="settings-form">
            <div class="settings-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-sliders-h"></i>
                        Global Styles
                        <span class="category-badge">Layout</span>
                    </h2>
                </div>
                
                <div class="settings-grid">
                    <?php 
                    $globalSettings = ['navbar_bg_color', 'navbar_scrolled_bg_color', 'navbar_padding', 'hero_text_color', 'hero_text_position', 'border_radius'];
                    foreach ($settings as $setting): 
                        if (in_array($setting['setting_name'], $globalSettings)):
                            $settingName = $setting['setting_name'];
                            $currentValue = $setting['setting_value'];
                            $isColor = strpos($settingName, '_color') !== false;
                            $isPosition = $settingName === 'hero_text_position';
                            $isPadding = $settingName === 'navbar_padding';
                            $isRadius = $settingName === 'border_radius';
                    ?>
                        <div class="setting-item">
                            <label for="setting_<?php echo $setting['id']; ?>">
                                <?php echo ucwords(str_replace('_', ' ', $settingName)); ?>
                            </label>
                            
                            <?php if ($isColor): ?>
                                <div class="color-picker">
                                    <select id="setting_<?php echo $setting['id']; ?>" 
                                           name="setting_<?php echo $setting['id']; ?>">
                                        <?php foreach ($presetOptions[$settingName] as $option): ?>
                                            <option value="<?php echo $option; ?>" <?php echo $currentValue === $option ? 'selected' : ''; ?>>
                                                <?php echo $option; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="color" 
                                           value="<?php echo $currentValue; ?>" 
                                           oninput="document.getElementById('setting_<?php echo $setting['id']; ?>').value = this.value">
                                </div>
                            <?php elseif ($isPosition || $isPadding || $isRadius): ?>
                                <select id="setting_<?php echo $setting['id']; ?>" 
                                       name="setting_<?php echo $setting['id']; ?>">
                                    <?php foreach ($presetOptions[$settingName] as $option): ?>
                                        <option value="<?php echo $option; ?>" <?php echo $currentValue === $option ? 'selected' : ''; ?>>
                                            <?php echo $option; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            <?php else: ?>
                                <input type="text" 
                                       id="setting_<?php echo $setting['id']; ?>" 
                                       name="setting_<?php echo $setting['id']; ?>" 
                                       value="<?php echo htmlspecialchars($currentValue); ?>">
                            <?php endif; ?>
                        </div>
                    <?php 
                        endif;
                    endforeach; 
                    ?>
                </div>
            </div>

            <div class="settings-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-object-group"></i>
                        Section Styles
                        <span class="category-badge">Components</span>
                    </h2>
                </div>
                
                <div class="settings-grid">
                    <?php 
                    $sectionSettings = ['info_section_bg_color', 'info_box_bg_color', 'info_box_text_color', 'highlight_bg_color', 
                                      'highlight_text_color', 'news_section_bg_color', 'news_text_color', 'research_title_bg_color', 
                                      'research_title_text_color', 'event_card_bg_color', 'event_text_color', 'footer_bg_color', 
                                      'footer_text_color', 'link_hover_color'];
                    foreach ($settings as $setting): 
                        if (in_array($setting['setting_name'], $sectionSettings)):
                            $settingName = $setting['setting_name'];
                            $currentValue = $setting['setting_value'];
                            $isColor = strpos($settingName, '_color') !== false;
                    ?>
                        <div class="setting-item">
                            <label for="setting_<?php echo $setting['id']; ?>">
                                <?php echo ucwords(str_replace('_', ' ', $settingName)); ?>
                            </label>
                            
                            <?php if ($isColor): ?>
                                <div class="color-picker">
                                    <select id="setting_<?php echo $setting['id']; ?>" 
                                           name="setting_<?php echo $setting['id']; ?>">
                                        <?php foreach ($presetOptions[$settingName] as $option): ?>
                                            <option value="<?php echo $option; ?>" <?php echo $currentValue === $option ? 'selected' : ''; ?>>
                                                <?php echo $option; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="color" 
                                           value="<?php echo $currentValue; ?>" 
                                           oninput="document.getElementById('setting_<?php echo $setting['id']; ?>').value = this.value">
                                </div>
                            <?php else: ?>
                                <input type="text" 
                                       id="setting_<?php echo $setting['id']; ?>" 
                                       name="setting_<?php echo $setting['id']; ?>" 
                                       value="<?php echo htmlspecialchars($currentValue); ?>">
                            <?php endif; ?>
                        </div>
                    <?php 
                        endif;
                    endforeach; 
                    ?>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" name="save_settings" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Save All Changes
                </button>
                <button type="submit" name="reset_defaults" class="btn btn-danger">
                    <i class="fas fa-undo"></i>
                    Reset to Defaults
                </button>
            </div>
        </form>
    </div>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('change', function() {
            const newTheme = this.checked ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', newTheme);
            document.cookie = `admin_theme=${newTheme}; path=/; max-age=${60*60*24*365}`;
            document.querySelector('.toggle-label').textContent = `${newTheme.charAt(0).toUpperCase() + newTheme.slice(1)} Mode`;
        });
        document.querySelectorAll('.color-picker input[type="color"]').forEach(picker => {
            picker.addEventListener('input', function() {
                const select = this.parentNode.querySelector('select');
                select.value = this.value;
            });
        });

        document.querySelectorAll('.color-picker select').forEach(select => {
            select.addEventListener('change', function() {
                const picker = this.parentNode.querySelector('input[type="color"]');
                picker.value = this.value;
            });
        });

        document.querySelector('button[name="reset_defaults"]').addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to reset all settings to default values?\nThis action cannot be undone.')) {
                e.preventDefault();
            }
        });

        document.querySelector('button[name="save_settings"]').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>