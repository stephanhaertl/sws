<?php
return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

        // check the honeypot
        if(empty(get('website')) === false) {
            go($page->url());
            exit;
        }

        $data = [
            'name'  => get('name'),
            'email' => get('email'),
            'text'  => get('text')
        ];

        $rules = [
            'name'  => ['required', 'minLength' => 3],
            'email' => ['required', 'email'],
            'text'  => ['required', 'minLength' => 3, 'maxLength' => 3000],
        ];

        $messages = [
            'name'  => 'Bitte geben Sie einen gültigen Namen ein.',
            'email' => 'Bitte geben Sie eine gültige E-Mailadresse ein.',
            'text'  => 'Bitte geben Sie eine Nachricht zwischen 3 und 3000 Zeichen ein.'
        ];

        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

            // the data is fine, let's send the email
        } else {
            try {
              $id = Db::insert('users', [
                'username' => 'moe',
                'email'    => 'moe@szyslak.com'
              ]);
              dump($id);

            } catch (Exception $error) {
                if(option('debug')):
                    $alert['error'] = 'Die Nachricht konnte nicht gesendet werden: <strong>' . $error->getMessage() . '</strong>';
                else:
                    $alert['error'] = 'Die Nachricht konnte nicht gesendet werden!';
                endif;
            }

            // no exception occurred, let's send a success message
            if (empty($alert) === true) {
                $success = 'Ihre Nachricht wurde versandt. Wir melden uns schnellst möglich bei Ihnen!';
                $data = [];
            }
        }
    }

    return [
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false
    ];
};
