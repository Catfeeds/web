<?php
namespace app\libs;

/**
 * Class Pager
 * order by Obelisk
 */


class GoodsPager
{
    private $pageNum;
    private $page;
    private $count;
    private $pageSize;
    private $pageAdd;

    private $totalPagesCount;


    public function __construct($count, $page, $pageSize = 10, $pageNum = 5)
    {
        if (!isset ($count) || !isset($page)) {
            die ("pager initial error");
        }

        $this->pageNum = $pageNum;
        $this->page = intval($page);
        $this->pageSize = $pageSize;
        $this->count = $count;
        $this->totalPagesCount = intval(ceil($count / $pageSize));
        $this->pageAdd = floor($pageNum/2);
    }


//    }
    /*
     *设置页面参数合法性
     *@return void
    */


    public function GetPagerContent()
    {
        $str = "";
        if($this->totalPagesCount <2){
            return$str;
        }else{
            // 上一页
            if( $this->page>0 && $this->totalPagesCount>0){
                if ($this->page == 1) {
                    $str .= '<span class="hid"><span class="page-go">&lt; </span>上一页</span>';
                } else {
                    $str .= '<a class="prev" href="javascript:;"><span class="page-go">&lt;</span>上一页</a>';
                }
            }
            /*
            除首末后 页面分页逻辑
            */
            //10页（含）以下
            $currnt = "";
            if ($this->totalPagesCount <= $this->pageNum) {
                for ($i = 1; $i <= $this->totalPagesCount; $i++) {
                    if ($i == $this->page) {
                        $str .= "<b>$i</b>";
                    } else {
                        $str .= "<a class='iPage' href='javascript:;'>$i</a>";
                    }
                }
            } else                                //10页以上
            {
                if($this->page<=(1+$this->pageAdd)){
                    for ($i = 1; $i <= $this->pageNum; $i++) {
                        if ($i == $this->page) {
                            $str .= "<b>$i</b>";
                        } else {
                            $str .= "<a class='iPage' href='javascript:;'>$i</a>";
                        }
                    }
                }
                if($this->page<=($this->totalPagesCount-$this->pageAdd) && $this->page>(1+$this->pageAdd)){
                    $first = $this->page-$this->pageAdd;
                    $end = $this->page+$this->pageAdd;
                    for ($i = $first; $i <= $end; $i++) {
                        if ($i == $this->page) {
                            $str .= "<b>$i</b>";
                        } else {
                            $str .= "<a class='iPage' href='javascript:;'>$i</a>";
                        }
                    }
                }
                if($this->page>($this->totalPagesCount-$this->pageAdd)){
                    for ($i = $this->totalPagesCount-$this->pageNum+1; $i <= $this->totalPagesCount; $i++) {
                        if ($i == $this->page) {
                            $str .= "<b>$i</b>";
                        } else {
                            $str .= "<a class='iPage' href='javascript:;'>$i</a>";
                        }
                    }
                }
            }
            /*
            除首末后 页面分页逻辑结束
            */
            //下一页 末页

            if ($this->page == $this->totalPagesCount) {
                $str .= '<span class="hid">下一页<span class="page-go"> &gt; </span></span>';
            } else {
                $str .= '<a class="next" href="javascript:;">下一页<span class="page-go"> &gt;</span></a>';
            }
            return $str;
        }

    }

//    /**
//     * 获得实例
//     * @return
//     */
//  static public function getInstance() {
//      if (is_null ( self::$_instance )) {
//          self::$_instance = new pager ();
//      }
//      return self::$_instance;
//  }

//调用实例---------------start
//include "pager.class.php";
//$CurrentPage=isset($_GET['page'])?$_GET['page']:1;
//$myPage=new pager(1300,intval($CurrentPage));
//$pageStr= $myPage->GetPagerContent();
//$myPage=new pager(90,intval($CurrentPage));
//$pageStr= $myPage->GetPagerContent();
//echo $pageStr;
//调用实例---------------end

}

?>