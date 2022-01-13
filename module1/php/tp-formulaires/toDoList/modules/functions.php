<?php

/**
 * @return array composed of :
 *  - an array version of the current json object representing both forms + errors
 *  - an array of above so-called 'objects'
 * @description sets usable array version of json files for app processing
 */
function initialize(): array
{
    if (file_get_contents(TMP)) {
        $arr = decodeJson(file_get_contents(TMP));
    } else {
        $arr = setArray();
    }
    if (file_get_contents(TASKS)) {
        $tasks = decodeJson(file_get_contents(TASKS));
    } else {
        $tasks = null;
    }
    return [$arr, $tasks];
}

/**
 * @param $obj mixed to be returned as array
 * @return array constructed from the jsonFile or array given if already an array
 * @description forces the json into full array to use the null values
 */
function decodeJson($obj): array
{
    if (!is_array($obj)) {
        return json_decode($obj, true, JSON_OBJECT_AS_ARRAY | JSON_FORCE_OBJECT);
    } else {
        return $obj;
    }
}

/**
 * @return array with only keys and null values to create a new json object
 * @description uses a CONST list of keys used by the app to generate the array structure
 */
function setArray(): array
{
    return array_fill_keys(REQUEST, null);
}

/**
 * @param $arr array gets and returns the current object
 * @return array is the updated version of the current object
 * @description pre-validating and updating the current object only with the safe data from the submitted form,
 * unsafe data are dropped and warning/messages are set
 */
function updateArray(array $arr): array
{
    foreach (REQUEST as $key) {
        if (isset($_POST[$key])) {
            $value = checkArray(trim($_POST[$key]), $key);
            if (!$value) {
                $arr[$key] = nullify(trim($_POST[$key]));
            }
            $arr['erreurs'][$key] = nullify($value);
        } else {
            $arr['erreurs'][$key] = nullify(checkArray($arr[$key], $key));
        }
    }
    return $arr;
}

/**
 * @param $field mixed successively each value found in POST
 * @param $key string key associated with field in the current object
 * @return string being either :
 *  - the errMsg
 *  - "" for unsafe
 */
function checkArray($field, string $key): string
{
    $okValues = [
        'id' => ['check' => "#^\d{2}$#", 'err' => "Id non conforme"],
        'titre' => ['check' => "#^[a-z A-Z-!À-ÿ]{3,55}$#", 'err' => "Obligatoire ! max 55 caractères et [- espace !]"],
        'description' => ['check' => "#^[a-z A-Z,.\"'\-!À-ÿ\n]{3,512}$#", 'err' => "max 500 caractères et [-!,.\" espace & entrée"],
        'date' => ['check' => "#^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$#", 'err' => "doit matcher yyyy-mm-dd"],
        'priorite' => ['check' => "#^basse$|^moyenne$|^haute$#", 'err' => "accepte uniquement 'basse' ou 'moyenne' ou 'haute', moyenne par défaut"],
        'modifier' => ['check' => "#^Modifier$#", 'err' => "stop trifouiller 'modifier'"],
        'supprimer' => ['check' => "#^Supprimer$#", 'err' => "stop trifouiller 'supprimer'"],
        'idTache' => ['check' => "#^\d{2}$#", 'err' => "id de menu déroulant non conforme"],
        'selectionDeTaches' => ['check' => "#^(\d{2},?)*$#", 'err' => "liste d'id du menu déroulant non conforme"],
        'enregistrer' => ['check' => "#^Enregistrer$#", 'err' => "stop trifouiller 'enregistrer'"],
        'erreurs' => ['check' => "#^[a-z0-9{}()&A-Z' =>\-À-ÿ\[\]\"\n!,.]{0,2048}$#", 'err' => "erreurCeption"]
    ];
    if (is_array($field)) {
        $field = implode($field);
    }
    if (!$field || preg_match($okValues[$key]['check'], $field)) {
        return false;
    } else {
        return $okValues[$key]['err'];
    }
}

/**
 * @param $zbra mixed
 * @return mixed|null
 * @description nullifies anything supposed to be null instead of just empty as null is part of the algorithm
 */
function nullify($zbra)
{
    if (empty($zbra)) {
        return null;
    } else {
        return $zbra;
    }
}

/**
 * @param $obj array current object in array version
 * @param $file string filePath / name
 * @return void
 * @description makes an array persistent by making it a jsonFile
 */
function jsonUpdate(array $obj, string $file): void
{
    file_put_contents($file, json_encode($obj));
}

function processArrays(array $arr, array $tasks):array {

    return [$arr, $tasks];
}

function updateTasks($arr)
{
    var_dump("update array");
    return $arr;
}

function resetButtons($arr): array
{
//    $arr['modifier'] = null;
    $arr['supprimer'] = null;
    $arr['enregistrer'] = null;
    return $arr;
}

