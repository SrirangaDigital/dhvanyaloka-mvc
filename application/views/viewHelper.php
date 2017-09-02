<?php

class viewHelper extends View {

	public function __construct() {

	}

    public function displayToc($data) {

        $stack = array();
        $p_stack = array();
        $first = 1;

        $li_id = 0;
        $ul_id = 0;

        $plus_link = '<img class="bpointer" src="'. STOCK_IMAGE_URL . 'bullet_1.gif" alt="Expand or Collapse"  />';
        $bullet = '<img class="bpointer" src="'. STOCK_IMAGE_URL . 'bullet_1.gif" alt="Point" />';

            echo "<div class=\"treeview tab-pane\">";

            foreach($data as $row) {

                $book_id = $row['book_id'];
                $btitle = $row['btitle'];
                $level = $row['level'];
                $title = $row['title'];
                $page = $row['page'];
                $authorname = '';
                
                $title = preg_replace('/(.*) - <i>(.*)<\/i>/', "$1", $row['title']);
                if(preg_match('/(.*) - <i>(.*)<\/i>/', $row['title']))
                {
                    $authorname = preg_replace('/(.*) - <i>(.*)<\/i>/', "<i>$2</i>", $row['title']);
                }
                if($authorname != "")
                {
                    $title = '<span class="sub_titlespan"><a target="_blank" href="'. PUBLIC_URL . 'books/' . $book_id . '.pdf#page=' . $page . '">' . $title . ' </a></span><br/><span class="authorspan">&nbsp;&nbsp;&nbsp;-&nbsp;' . $authorname . '</span>';
                }
                else
                {
                    $title = '<span class="sub_titlespan"><a target="_blank" href="'. PUBLIC_URL . 'books/' . $book_id . '.pdf#page=' . $page . '">' . $title . ' </a></span>';
                }

                if($first)
                {
                    array_push($stack,$level);
                    $ul_id++;
                    echo "<ul id=\"ul_id$ul_id\">\n";
                    array_push($p_stack,$ul_id);
                    $li_id++;
                    $deffer = $this->display_tabs($level) . "<li id=\"li_id$li_id\">:rep:$title";
                    $first = 0;
                }
                elseif($level > $stack[sizeof($stack)-1])
                {
                    $deffer = preg_replace('/:rep:/',"$plus_link",$deffer);
                    echo $deffer;           

                    $ul_id++;           
                    $li_id++;           
                    array_push($stack,$level);
                    array_push($p_stack,$ul_id);
                    $deffer = "\n" . $this->display_tabs(($level-1)) . "<ul class=\"dnone\" id=\"ul_id$ul_id\">\n";
                    $deffer = $deffer . $this->display_tabs($level) ."<li id=\"li_id$li_id\">:rep:$title";
                }
                elseif($level < $stack[sizeof($stack)-1])
                {
                    $deffer = preg_replace('/:rep:/',"$bullet",$deffer);
                    echo $deffer;
                    
                    for($k=sizeof($stack)-1;(($k>=0) && ($level != $stack[$k]));$k--)
                    {
                        echo "</li>\n". $this->display_tabs($level) ."</ul>\n";
                        $top = array_pop($stack);
                        $top1 = array_pop($p_stack);
                    }
                    $li_id++;
                    $deffer = $this->display_tabs($level) . "</li>\n";
                    $deffer = $deffer . $this->display_tabs($level) ."<li id=\"li_id$li_id\">:rep:$title";
                }
                elseif($level == $stack[sizeof($stack)-1])
                {
                    $deffer = preg_replace('/:rep:/',"$bullet",$deffer);
                    echo $deffer;
                    $li_id++;
                    $deffer = "</li>\n";
                    $deffer = $deffer . $this->display_tabs($level) ."<li id=\"li_id$li_id\">:rep:$title";
                }
            }

            $deffer = preg_replace('/:rep:/',"$bullet",$deffer);
            echo $deffer;

            for($i=0;$i<sizeof($stack);$i++)
            {
                echo "</li>\n". $this->display_tabs($level) ."</ul>\n";
            }            

        echo "</div>";
    }    

    public function display_tabs($num)
    {
        $str_tabs = "";
        
        if($num != 0)
        {
            for($tab=1;$tab<=$num;$tab++)
            {
                $str_tabs = $str_tabs . "\t";
            }
        }
        
        return $str_tabs;
    }
}

?>
