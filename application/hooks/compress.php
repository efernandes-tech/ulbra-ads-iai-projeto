<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function compress() {
    ini_set("pcre.recursion_limit", "16777");
    $CI = & get_instance();
    $buffer = $CI->output->get_output();
    $re = '%
        (?>
            [^\S ]\s*
        | \s{2,}
        )
        (?=
            [^<]*+
            (?:
                <
                (?!/?(?:textarea|pre|script)\b)
                [^<]*+
            )*+
            (?:
                <
                (?>textarea|pre|script)\b
            | \z
            )
        )
        %Six';

    $new_buffer = preg_replace($re, " ", $buffer);

    if ($new_buffer === null) {
        $new_buffer = $buffer;
    }

    $CI->output->set_output($new_buffer);
    $CI->output->_display();
}
