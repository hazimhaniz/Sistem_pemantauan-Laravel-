<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Input following language lines contain Input default error messages used by
    | Input validator class. Some of Inputse rules have multiple versions such
    | as Input size rules. Feel free to tweak each of Inputse messages here.
    |
    */

    'accepted'             => 'Input :attribute mesti diterima.',
    'active_url'           => 'Input :attribute bukanlah URL yang valid.',
    'after'                => 'Input :attribute tarikh mestilah selepas tarikh :date.',
    'after_or_equal'       => 'Input :attribute must be a date after or equal to :date.',
    'alpha'                => 'Input :attribute may only contain letters.',
    'alpha_dash'           => 'Input :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'Input :attribute may only contain letters and numbers.',
    'array'                => 'Input :attribute must be an array.',
    'before'               => 'Input :attribute must be a date before :date.',
    'before_or_equal'      => 'Input :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'Input :attribute must be between :min and :max.',
        'file'    => 'Input :attribute must be between :min and :max kilobytes.',
        'string'  => 'Input :attribute must be between :min and :max characters.',
        'array'   => 'Input :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'Input :attribute field must be true or false.',
    'confirmed'            => 'Input :attribute confirmation does not match.',
    'date'                 => 'Input :attribute is not a valid date.',
    'date_format'          => 'Input :attribute does not match Input format :format.',
    'different'            => 'Input :attribute and :oInputr must be different.',
    'digits'               => 'Input :attribute must be :digits digits.',
    'digits_between'       => 'Input :attribute must be between :min and :max digits.',
    'dimensions'           => 'Input :attribute has invalid image dimensions.',
    'distinct'             => 'Input :attribute field has a duplicate value.',
    'email'                => 'Input :attribute mestilah emel yang valid diterima dalam input sistem.',
    'exists'               => 'Input dipilih :attribute adalah tidak valid.',
    'file'                 => 'Input :attribute must be a file.',
    'filled'               => 'Input :attribute mesti mempunyai nilai.',
    'image'                => 'Input :attribute must be an image.',
    'in'                   => 'Input selected :attribute is invalid.',
    'in_array'             => 'Input :attribute field does not exist in :oInputr.',
    'integer'              => 'Input :attribute must be an integer.',
    'ip'                   => 'Input :attribute must be a valid IP address.',
    'ipv4'                 => 'Input :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'Input :attribute must be a valid IPv6 address.',
    'json'                 => 'Input :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'Input :attribute may not be greater than :max.',
        'file'    => 'Input :attribute may not be greater than :max kilobytes.',
        'string'  => 'Input :attribute may not be greater than :max characters.',
        'array'   => 'Input :attribute may not have more than :max items.',
    ],
    'mimes'                => 'Input :attribute must be a file of type: :values.',
    'mimetypes'            => 'Input :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'Input :attribute must be at least :min.',
        'file'    => 'Input :attribute must be at least :min kilobytes.',
        'string'  => 'Input :attribute must be at least :min characters.',
        'array'   => 'Input :attribute must have at least :min items.',
    ],
    'not_in'               => '',
    'numeric'              => 'Input :attribute must be a number.',
    'present'              => 'Input :attribute field must be present.',
    'regex'                => 'Input :attribute format is invalid.',
    'required'             => '',
    'required_if'          => 'Input :attribute field is required when :oInputr is :value.',
    'required_unless'      => 'Input :attribute field is required unless :oInputr is in :values.',
    'required_with'        => 'Input :attribute field is required when :values is present.',
    'required_with_all'    => 'Input :attribute field is required when :values is present.',
    'required_without'     => 'Input :attribute field is required when :values is not present.',
    'required_without_all' => 'Input :attribute field is required when none of :values are present.',
    'same'                 => 'Input :attribute and :oInputr must match.',
    'size'                 => [
        'numeric' => 'Input :attribute must be :size.',
        'file'    => 'Input :attribute must be :size kilobytes.',
        'string'  => 'Input :attribute must be :size characters.',
        'array'   => 'Input :attribute must contain :size items.',
    ],
    'string'               => 'Input :attribute must be a string.',
    'timezone'             => 'Input :attribute must be a valid zone.',
    'unique'               => 'Input :attribute has already been taken.',
    'uploaded'             => 'Input :attribute failed to upload.',
    'url'                  => 'Input :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using Input
    | convention "attribute.rule" to name Input lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Input following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
