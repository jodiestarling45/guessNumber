<?php

class Queue
{
    public $arr;
    public $value;
    public $count;
    public $limit;

    public function __construct($array, $limit)
    {
        if (is_array($array)){
            $this->arr=$array;
        }else{
            $this->arr=[];
        }
        if (is_integer($limit)){
            $this->limit=$limit;
        }else{
            $this->limit=10;
        }
        $this->count=-1;
        $this->value=0;
    }
    public function isEmpty(){
        return empty($this->arr);
    }
    public function pop(){
        array_shift($this->arr);
        $this->count++;
    }
    public function push($value){
        if ($this->isEmpty()||count($this->arr)<=$this->limit){
            array_push($this->arr,$value);
            $this->count++;
        }else{
            $this->pop();
            array_push($this->arr,$value);
            $this->count++;
        }
    }
    public function show(){
        return implode(",",$this->arr);
    }
    public function search($value,$first,$last){
        if ($first>$last){
            return "please enter again first and last make sure first smaller than last";
        }
        $middle = ($first+$last)/2;
        if ($value == $this->arr[$middle]){
            echo "wow we found it".$this->arr[$middle]."<br>";
        }else{
            echo "let check it again shall we "."<br>";
            if ($value<$this->arr[$middle]){
                $last = $middle -1 ;
                if ($value== $this->arr[$last]){
                    echo "wow we found it ".$this->arr[$last]."<br>";
                }else{
                    $this->search($value,$first,$last);
                }
            }else{
                $first = $middle+1;
                if ($value==$this->arr[$first]){
                    echo "wow we found it".$this->arr[$first]."<br>";
                }else{
                    $this->search($value,$first,$last);
                }
            }
        }
    }
}
$queue=new Queue($arr=[],100);
for ($i=1;$i<=100;$i++){
    $queue->push($i);
}
$queue->search(6,1,100);