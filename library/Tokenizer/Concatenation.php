<?php

namespace Tokenizer;

class Concatenation extends TokenAuto {
    public static $operators = array('T_DOT');
    static public $atom = 'Concatenation';
    
    public function _check() {
        $operands = array('String', 'Identifier', 'Integer', 'Float', 'Not', 'Variable', 'Array', 'Concatenation', 'Sign', 'Array',
                          'Functioncall', 'Noscream', 'Staticproperty', 'Staticmethodcall', 'Staticconstant', 'Staticclass',
                          'Methodcall', 'Parenthesis', 'Magicconstant', 'Property', 'Multiplication', 'Addition', 'Power',
                          'Preplusplus', 'Postplusplus', 'Cast', 'Assignation', 'Nsname', 'Boolean', 'Null', 'Shell', 'Power',
                          'Heredoc', 'New' );
        
        $this->conditions = array(-2 => array('token' => array_merge( Assignation::$operators, Comparison::$operators,
                                                                      Logical::$operators, _Include::$operators,
                                                                      Bitshift::$operators, _Clone::$operators,
                                                                      Ternary::$operators, _Return::$operators,
                                                                      Keyvalue::$operators, 
                                                                      array('T_COLON', 'T_COMMA', 'T_OPEN_PARENTHESIS',
                                                                            'T_OPEN_CURLY', 'T_OPEN_BRACKET', 
                                                                            'T_ECHO', 'T_PRINT','T_OPEN_TAG',
                                                                            'T_SEMICOLON', 'T_CASE'))),
                                  -1 => array('atom'  => $operands ),
                                   0 => array('token' => 'T_DOT'),
                                   1 => array('atom'  => $operands,
                                              'check_for_concatenation' => $operands),
                                   2 => array('token' => array_merge(Comparison::$operators, Logical::$operators,
                                                          Power::$operators, Addition::$operators, Multiplication::$operators,
                                                          array('T_CLOSE_PARENTHESIS', 'T_COLON', 'T_SEMICOLON', 'T_CLOSE_TAG',
                                                               'T_CLOSE_CURLY', 'T_CLOSE_BRACKET', 'T_DOT', 'T_QUESTION',
                                                               'T_COMMA', 'T_DOUBLE_ARROW', 'T_ELSEIF'))),
        );
        
        $this->actions = array('to_concatenation' => true,
                               'atom'             => 'Concatenation',
                               'makeSequence'     => 'x',
                               );
        $this->checkAuto();

        return false;
    }

    public function fullcode() {
        return <<<GREMLIN
s = [];
fullcode.out("CONCAT").sort{it.rank}._().each{ s.add(it.fullcode); };
fullcode.setProperty('fullcode', "" + s.join(" . ") + "");
fullcode.setProperty('count', s.size());

GREMLIN;
    }

}
?>
