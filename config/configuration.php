<?php

// Démarrage la session
session_start();

// Ajoute le fichier defines.php
require_once 'defines.php';

/*
 * Met a jour l'horloge avec le timezone par default
 * avec la constante TIMEZONE_DEFAULT défini dans le fichier defines.php
 */
date_default_timezone_set(TIMEZONE_DEFAULT);

/**
 * Redirige sur une autre page.
 *
 * @return void
 */
function redirectToRoute(string $target)
{
    header('Location: '.$target);
    exit();
}

/**
 * Function var_dump().
 *
 * Affiche les var_dump seulement si l'application
 * est en environnement développement.
 *
 * APP_ENV est definie dans le fichier defines.php
 * APP_ENV = true (environnement développement)
 * APP_ENV = false (environnement production)
 *
 * @param void $variable (varibale a tester, peu être de type bool,array,string,int,float...)
 * @param bool $type     (false pour le print_r, true pour le var_dump)
 *
 * @return string|null
 */
function _dump($variable, bool $type = false): ?string
{
    if (APP_ENV === true && $type === false) {
        return '<pre class="my-4">'.print_r($variable, true).'</pre>';
    } elseif (APP_ENV === true && $type === true) {
        return var_dump($variable);
    } else {
        return null;
    }
}



/**
 * Cette méthode permet de supprimer tout
 * les caractères spéciaux d'une chaîne.
 *
 * @param string $text comment
 *
 * @return string
 */
function removeSpecialChar(string $text): string
{
    return preg_replace('/[^A-Za-z0-9\-]/', '', $text);
}

/**
 * Supprime les balises HTML et PHP d'une chaîne.
 *
 * @param string $text comment
 *
 * @return string
 */
function stripTags(string $text): string
{
    return strip_tags($text);
}

/**
 * Remplace tous les accents par leur équivalent sans accent.
 *
 * @param string $text comment
 *
 * @return string
 */
function enleveAccents(string $text): string
{
    return str_replace(
        [
            'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'à', 'á', 'â', 'ã', 'ä', 'å',
            'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø',
            'È', 'É', 'Ê', 'Ë', 'è', 'é', 'ê', 'ë',
            'Ç', 'ç',
            'Ì', 'Í', 'Î', 'Ï', 'ì', 'í', 'î', 'ï',
            'Ù', 'Ú', 'Û', 'Ü', 'ù', 'ú', 'û', 'ü',
            'ÿ',
            'Ñ', 'ñ',
        ],
        [
            'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
            'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
            'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e',
            'c', 'c',
            'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i',
            'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u',
            'y',
            'n', 'n',
        ],
        $text
    );
}

/**
 * Formate un text pour un slug bdd.
 * Ex: mon-dossier-perso.
 *
 * @param string $text    comment
 * @param string $replace comment
 *
 * @return string
 */
function slug(string $text, string $replace = '-'): string
{
    $text = strtolower(
        removeSpecialChar(
            str_replace(
                [' ', '_', ',', '.'],
                [$replace, $replace, $replace, $replace],
                enleveAccents($text)
            )
        )
    );

    if (substr($text, strlen($text) - 1, strlen($text)) === $replace) {
        $text = rtrim($text, $replace);
        slug($text);
    }

    return $text;
}

?>