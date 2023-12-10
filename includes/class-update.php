<?php




$github_username = 'tominik83';
$github_repo = 'log-reg';

// $url = "https://api.github.com/repos/$github_username/$github_repo/releases";
$server_url = "http://dev.bibliotehnika.tk.test/wp-json/plugin/releases/data/";
$request_args = array(
    'timeout' => 600,
);

$headers = array(
    'User-Agent: log-reg',
);

$response = wp_safe_remote_request($server_url, array('headers' => $headers, $request_args));

if (is_wp_error($response)) {
    // Error getting data
    echo '<p class="error-msg">Error</p>';
} else {
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if (is_array($data)) {
        $latest_download_link = null;
        foreach ($data as $release) {
            if (isset($release['tag_name'])) {
                $tag_name = esc_html($release['tag_name']);
                $name = esc_html($release['name']);
                $release_notes = esc_html($release['body']);
                $plugin_path = 'wp-content/plugins/log-reg/log-reg.php';

                if (file_exists($plugin_path)) {
                    $plugin_data = get_file_data($plugin_path, array('Version' => 'Version'));

                    if (isset($plugin_data['Version'])) { // PROVERA VERZIJE PLUGIN-a
                        $plugin_version = $plugin_data['Version'];
                        $latest_download_link = esc_url("https://github.com/$github_username/$github_repo/archive/refs/tags/$tag_name.zip");

                        if (version_compare($tag_name, $plugin_version, '>')) {
                            echo '<div id="update-info">';
                            echo '<p class="update-available"> Update Available: ' . esc_html($tag_name) . '</p>';
                            echo '<p class="update-available"> Name: ' . esc_html($name) . '</p>';
                            echo '<p class="update-available"> Description: ' . esc_html($release_notes) . '</p>';
                            echo '<a href="' . $latest_download_link . '" class="download-button">Download</a>';
                            echo '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAW1JREFUSEutlttZwzAMRo82KZuQTcokZZN2E7IJMIn5fEki2VKcB/KStrZ1+S9yhf0RIB1f3U+CkKa7ytEWLr+cR63OcvbRtv1hAh17aEr/4Hx2QDAdHOsDFG4fAnLeoCA+8jpB2ZE2TDvO8sZT6lQH0c6WICbrYLTt6cG7oqOGxIB7KzAurkI0V6gD9X5y6E3HDGRqz0gmwVeIQ7KVoeGgmKiuP4DPE4cMXEN6AR893mcdPBHuvW379ltBK7BswUOItA+a9r5BbpMRUoJHnpxxcAO+gPz2xtYP8GYGTyeHCz4owcckkINnzNc9QTDV4mF3rLwjPEkaLlkgrdXJ8YwaZ1Hsiaysu8AtCQtJ1ogbM9PmRjPVPSD9IrziS8FWWDtoWZQPZjOsHDoun+giCqfpFVqiy087udbeP8lWpzUSkWnGqOXV4fTSJdlDpAgfhLOn15j+1x+AK0arBThy8y0QqigmTavLH/7WyzrFH7dQmx8CV/g9AAAAAElFTkSuQmCC"/>';
                            echo '</div>';
                        }
                    }
                }
            }
        }
    }
}































