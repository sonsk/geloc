<?php
class Alert
{
    public static function successAdd($nom){
        echo "<script>Swal.fire('Succès',
                '$nom ajouté avec succès ',
                'success');
            </script>";
    }
    public static function errorAdd($nom){
        echo "<script>Swal.fire('Echec',
        '$nom n'a pas été ajouté ',
        'erreur');
        </script>";
    }
    public static function infoMessage($message) {
        echo "<script>Swal.fire('Information',
        '$message',
        'info');
        </script>";
    }

    public static function warningMessage($message) {
        echo "<script>Swal.fire('Attention',
        '$message',
        'warning');
        </script>";
    }
}
