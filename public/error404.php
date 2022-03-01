<?php

(function () {
    echo json_encode([
        'status' => 'failure',
        'http_status' => 404,
        'message' => 'page not found'
    ]);
})();