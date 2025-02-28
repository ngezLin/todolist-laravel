<?php

\it('redirects from / to dashboard', function () {
    $response = $this->get('/');

    $response->assertRedirect('/viewtask');
});
