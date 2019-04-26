--TEST--
Uses a custom fully qualified expansion function --pretty-print
--FILE--
<?php

$(macro) {
    hello($(token(T_STRING) as matched));
} >> {
    $$(\Yay\tests\fixtures\expanders\my_cheers_ast_expander(
        $$(\Yay\tests\fixtures\expanders\my_hello_ast_expander(
            $(matched)
        ))
    ));
}

hello(Chris);

?>
--EXPECTF--
<?php

'Hello, Chris. From Ast. Cheers!';

?>