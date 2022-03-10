<?php

use Japanese as GlobalJapanese;

/**
 * クラス継承
 */
abstract class Person
{
    protected $name;
    // protected は自クラス内もしくは斉唱先のクラスにてアクセス可能
    public $age;
    public static $WHERE = 'Earth';

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
        echo self::$WHERE;
        echo static::$WHERE;
    }
    // final function hello()　と文頭にfinalを置くことで継承先での変更overrideできなくさせる
    
    // abstract function hello(){}
    // 継承先で必ず実装させたい場合にはabstractを用いる
    // 利点　　継承クラスでメソッドの存在が保証される
    // 関数だけ定義しといて、生成したオブジェクト内で各々処理内容（中身）を記述する

    // abstract class Person  と記述すると
    // 元クラス内で定義した中身は継承先のクラスにおいて初めて実装できる（利用可）


    function hello() {
        echo 'hello, ' . $this->name;
        return $this;
    }

    static function bye() {
        echo 'bye';
    }
}


class Japanese extends Person{
    public static $WHERE = '日本';
    function __construct($name, $age)
    {
        parent::__construct($name, $age);
        // $this->name = $name;
        // $this->age = 30;
    }

    function hello() {
        echo 'こんにちは, ' . $this->name;
        return $this;
    }
    // 継承元の関数を変更することをオーバーライドと呼ぶ
    function jusho(){
        echo '住所は'.parent::$WHERE.'です。';

    }
}

$taro = new Japanese('太郎', 18);
// $taro->hello();
// $taro->jusho();
// 使い分け
// parent  親元のプロパティやメソッドを引っ張ってくる

// selfとstaticの使い分け
// self   親クラスまで遡る　　　　　　　　　　　　　　　　　　　深い
// static　　継承先にあればそれを使う　　　　　　浅い
