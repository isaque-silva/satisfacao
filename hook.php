<?php

function plugin_satisfacao_install() {
    global $DB, $LANG;

    // Configurações
    if (!$DB->TableExists("glpi_plugin_satisfacao_hashes")) {
        $query_conf = "
            CREATE TABLE `glpi_plugin_satisfacao_hashes` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `ticket_id` INT(11) NOT NULL,
                `satisfaction_survey_hash` VARCHAR(255) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ";

        $DB->query($query_conf) or die("Erro ao criar tabela glpi_plugin_satisfacao_hashes: " . $DB->error());
    }

    return true;
}

/**
 * Ao criar uma tabela, não se esqueça de excluí-la se o plugin for desinstalado.
 *
 * @return boolean Retorna true se tiver sucesso
 */
function plugin_satisfacao_uninstall() {
    global $DB;

    $drop_count = "DROP TABLE IF EXISTS glpi_plugin_satisfacao_hashes";
    $DB->query($drop_count);

    return true;
}
