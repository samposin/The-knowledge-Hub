<?php
    if (! function_exists('delete_file')) {
        function delete_file($file) { 
            if (file_exists($file)) {
            @unlink($file);
            }
        }
    }
