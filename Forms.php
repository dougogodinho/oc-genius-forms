<?php namespace Genius\Forms;

use Illuminate\Support\Facades\Lang;
use RainLab\Translate\Models\Message;

class Forms
{

    private static function validadeArguments (&$label, &$id, &$value, &$options)
    {
        // id
        if (is_null($id)) {
            $id = strtolower($label);
        }

        // value
        if (is_array($value)) {
            $options = $value;
            $value = '';
        }

        // error
        if (!isset($options['error'])) {
            $options['error'] =  '';
        }

        // style
        if (!isset($options['style'])) {
            $options['style'] =  '';
        }

        // input_style
        if (!isset($options['input_style'])) {
            $options['input_style'] =  '';
        }

        // placeholder
        if (!isset($options['placeholder'])) {
            $options['placeholder'] =  $label;
        }

        // mask
        $options['mask'] =  isset($options['mask']) ? 'data-mask="' . $options['mask'] . '"' : '';

        // width
        if (isset($options['width'])) {
            $options['style'] .=  'width:'.$options['width'].';';
        }

        // height
        if (isset($options['height'])) {
            $options['input_style'] .=  'height:'.$options['height'].';';
        }
    }

    public static function input ($label, $id = null, $value = null, $options = null)
    {
        self::validadeArguments($label, $id, $value, $options);
        ?>
        <div class="form-group <?= $options['error'] ? 'has-error' : '' ?>" style="<?= $options['style'] ?>">
            <label class="control-label" for="<?= $id ?>"><?= $label ?></label>
            <input class="form-control" placeholder="<?= $options['placeholder'] ?>" name="<?= $id ?>" id="<?= $id ?>" value="<?= $value ?>" type="text" style="<?= $options['input_style'] ?>" <?= $options['mask'] ?>>
            <span class="help-block input-error"><?= $options['error'] ?></span>
        </div>
        <?php
    }

    public static function textarea ($label, $id = null, $value = null, $options = null)
    {
        self::validadeArguments($label, $id, $value, $options);
        ?>
        <div class="form-group <?= $options['error'] ? 'has-error' : '' ?>" style="<?= $options['style'] ?>">
            <label class="control-label" for="<?= $id ?>"><?= $label ?></label>
            <textarea class="form-control" name="<?= $id ?>" id="<?= $id ?>" placeholder="<?= $options['placeholder'] ?>" style="<?= $options['input_style'] ?>"><?= $value ?></textarea>
            <span class="help-block input-error"><?= $options['error'] ?></span>
        </div>
        <?php
    }

    public static function form ($action, $options = null)
    {
        $data = isset($options['data']) ? json_encode($options['data']) : '';
        ?>
        <form class="genius-form"
              data-request="<?= $action ?>"
              data-request-error=""
              data-request-data="<?= trim($data, ' {}') ?>">
        <?php
    }
}