<div class="menu_group" >
    <div class="menu_btn">

        <div class="title">
            <h2>前台功能</h2>
        </div>
        <ul>
            <li>
               <input type="checkbox" id="menu_btn1" name="menu_btn" {{($now=='page')?'checked':''}} hidden>
               <label for="menu_btn1" class="link-btn {{($now=='page')?'active':''}}">
                   <div class="info" >
                       <div class="icon mr-3">
                           <i class="fas fa-building"></i>
                       </div>
                       <div class="text">
                           <h6>部門專區</h6>
                           <p>Department</p>
                       </div>
                   </div>
                   <i class="fa fa-caret-left arrow"></i>
               </label>
               <div class="list_box">
                   <ul>
                       <li>
                           <a href="{{url('/calender/'.$department.'/'.Auth::user()->class_id)}}">
                               <i class="fas fa-tv"></i>
                               行事曆
                           </a>
                       </li>
                       <li>
                           <a href="{{url('/fileself/'.Auth::user()->class_id)}}">
                               <i class="fas fa-tv"></i>
                               個人檔案
                           </a>
                       </li>
                       <li>
                           <a href="{{url('/file/'.$department.'/'.Auth::user()->class_id)}}">
                               <i class="fas fa-tv"></i>
                               部門檔案
                           </a>
                       </li>
                       <li>
                            <a href="{{url('/news/'.$department.'/'.Auth::user()->class_id)}}">
                                <i class="fas fa-tv"></i>
                                部門廣播
                            </a>
                        </li>
                   </ul>
               </div>
           </li>
           <li>
               <input type="checkbox" id="menu_btn3" name="menu_btn" {{($now=='banner')?'checked':''}} hidden>
               <label for="menu_btn3" class="link-btn {{($now=='banner')?'active':''}}">
                   <div class="info" >
                       <div class="icon mr-3">
                           <i class="fas fa-images"></i>
                       </div>
                       <div class="text">
                           <h6>橫幅管理</h6>
                           <p>Banner</p>
                       </div>
                   </div>
                   <i class="fa fa-caret-left arrow"></i>
               </label>
               <div class="list_box">
                   <ul>
                       <li>
                           <a href="{{url('backstage/banner')}}">
                               <i class="far fa-image"></i>
                               廣告橫幅
                           </a>
                       </li>
                       <li>
                           <a href="{{url('backstage/breadcrumbs')}}">
                               <i class="far fa-image"></i>
                               麵包屑橫幅
                           </a>
                       </li>
                   </ul>
               </div>
           </li>
           <li>
               <input type="checkbox" id="menu_btn4" name="menu_btn" {{($now=='glory')?'checked':''}} hidden>
               <label for="menu_btn4" class="link-btn {{($now=='glory')?'active':''}}">
                   <div class="info" >
                       <div class="icon mr-3">
                           <i class="fas fa-hands-helping"></i>
                       </div>
                       <div class="text">
                           <h6>策略夥伴</h6>
                           <p>Glory</p>
                       </div>
                   </div>
                   <i class="fa fa-caret-left arrow"></i>
               </label>
               <div class="list_box">
                   <ul>
                       <li>
                           <a href="{{url('backstage/gloryclass')}}">
                               <i class="fas fa-hands-helping"></i>
                               分類管理
                           </a>
                       </li>
                       <li>
                           <a href="{{url('backstage/glory')}}">
                               <i class="fas fa-hands-helping"></i>
                               廠商管理
                           </a>
                       </li>
                   </ul>
               </div>
           </li>
           <li>
               <input type="checkbox" id="menu_btn5" name="menu_btn" {{($now=='news')?'checked':''}} hidden>
               <label for="menu_btn5" class="link-btn {{($now=='news')?'active':''}}">
                   <div class="info" >
                       <div class="icon mr-3">
                           <i class="far fa-newspaper"></i>
                       </div>
                       <div class="text">
                           <h6>最新消息</h6>
                           <p>News</p>
                       </div>
                   </div>
                   <i class="fa fa-caret-left arrow"></i>
               </label>
               <div class="list_box">
                   <ul>
                       <li>
                           <a href="{{url('backstage/newsclass')}}">
                               <i class="far fa-newspaper"></i>
                               分類管理
                           </a>
                       </li>
                       <li>
                           <a href="{{url('backstage/news')}}">
                               <i class="far fa-newspaper"></i>
                               消息管理
                           </a>
                       </li>
                       <li>
                           <a href="{{url('backstage/news/featrued')}}">
                               <i class="far fa-newspaper"></i>
                               精選消息
                           </a>
                       </li>
                   </ul>
               </div>
           </li>
           <li>
               <input type="checkbox" id="menu_btn6" name="menu_btn" {{($now=='results')?'checked':''}} hidden>
               <label for="menu_btn6" class="link-btn {{($now=='results')?'active':''}}">
                   <div class="info" >
                       <div class="icon mr-3">
                           <i class="fas fa-briefcase"></i>
                       </div>
                       <div class="text">
                           <h6>實績成果</h6>
                           <p>Results</p>
                       </div>
                   </div>
                   <i class="fa fa-caret-left arrow"></i>
               </label>
               <div class="list_box">
                   <ul>
                       <li>
                           <a href="{{url('backstage/resultsclass')}}">
                               <i class="fas fa-briefcase"></i>
                               分類管理
                           </a>
                       </li>
                       <li>
                           <a href="{{url('backstage/results')}}">
                               <i class="fas fa-briefcase"></i>
                               成果管理
                           </a>
                       </li>
                       <li>
                           <a href="{{url('backstage/results/featrued')}}">
                               <i class="fas fa-briefcase"></i>
                               精選成果
                           </a>
                       </li>
                   </ul>
               </div>
           </li>
           <li>
               <input type="checkbox" id="menu_btn7" name="menu_btn" {{($now=='origin2')?'checked':''}} hidden>
               <label for="menu_btn7" class="link-btn {{($now=='origin2')?'active':''}}">
                   <div class="info" >
                       <div class="icon mr-3">
                           <i class="far fa-building"></i>
                       </div>
                       <div class="text">
                           <h6>關於我們</h6>
                           <p>Origin</p>
                       </div>
                   </div>
                   <i class="fa fa-caret-left arrow"></i>
               </label>
               <div class="list_box">
                   <ul>
                       <li>
                           <a href="{{url('backstage/origin2')}}">
                               <i class="far fa-building mr-2"></i>
                               關於弈橙
                           </a>
                       </li>
                       <li>
                           <a href="{{url('backstage/teams')}}">
                               <i class="fa fa-users"></i>
                               核心團隊
                           </a>
                       </li>
                       <li>
                           <a href="{{url('backstage/brandview')}}">
                               <i class="far fa-building mr-2"></i>
                               自有品牌
                           </a>
                       </li>
                   </ul>
               </div>
           </li>
           <li>
               <a href="{{url('/backstage/service')}}" class="link-btn {{($now=='service')?'active':''}}">
                   <div class="info">
                       <div class="icon mr-3">
                           <i class="fas fa-list-ul"></i>
                       </div>
                       <div class="text">
                           <h6>弈橙服務</h6>
                           <p>Service</p>
                       </div>
                   </div>
               </a>
           </li>
           <li>
               <a href="{{url('/backstage/search')}}" class="link-btn {{($now=='search')?'active':''}}">
                   <div class="info">
                       <div class="icon mr-3">
                           <i class="fas fa-search"></i>
                       </div>
                       <div class="text">
                           <h6>熱門搜尋</h6>
                           <p>Search</p>
                       </div>
                   </div>
               </a>
           </li>
           <!--<li>
               <a href="{{url('/backstage/print')}}" class="link-btn {{($now=='print')?'active':''}}">
                   <div class="info">
                       <div class="icon mr-3">
                           <i class="fas fa-print"></i>
                       </div>
                       <div class="text">
                           <h6>曲譜複印</h6>
                           <p>Print</p>
                       </div>
                   </div>
               </a>
           </li>
           <li>
               <a href="{{url('/backstage/link')}}" class="link-btn {{($now=='link')?'active':''}}">
                   <div class="info">
                       <div class="icon mr-3">
                           <i class="fas fa-link"></i>
                       </div>
                       <div class="text">
                           <h6>相關連結</h6>
                           <p>Links</p>
                       </div>
                   </div>
               </a>
           </li>
           <li>
               <a href="{{url('/backstage/activity')}}" class="link-btn {{($now=='activity')?'active':''}}">
                   <div class="info">
                       <div class="icon mr-3">
                           <i class="fa fa-images"></i>
                       </div>
                       <div class="text">
                           <h6>活動花絮</h6>
                           <p>Activity</p>
                       </div>
                   </div>
               </a>
           </li>-->
       </ul>
       @if($member==4)
       <div class="title">
            <h2>訪客資料更新</h2>
        </div>
        <ul>
            <li>
                <a href="{{url('/password/guest')}}" class="link-btn {{($now=='message')?'active':''}}">
                    <div class="info">
                        <div class="icon mr-3">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="text">
                            <h6>訪客密碼更新</h6>
                            <p>Password</p>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
        @endif
        @if(Auth::user()->level==0||Auth::user()->level==2)
        <div class="title">
            <h2>後台管理</h2>
        </div>
       <ul>
           <li>
               <a href="{{url('/backstage/message')}}" class="link-btn {{($now=='message')?'active':''}}">
                   <div class="info">
                       <div class="icon mr-3">
                           <i class="fas fa-envelope-open-text"></i>
                       </div>
                       <div class="text">
                           <h6>留言管理</h6>
                           <p>Message</p>
                       </div>
                   </div>
               </a>
           </li>
           <!--<li>
               <a href="{{url('/backstage/teams')}}" class="link-btn {{($now=='teams')?'active':''}}">
                   <div class="info">
                       <div class="icon mr-3">
                           <i class="fas fa-cubes"></i>
                       </div>
                       <div class="text">
                           <h6>部門管理</h6>
                           <p>Teams</p>
                       </div>
                   </div>
               </a>
           </li>-->
           <li>
               <input type="checkbox" id="menu_btn2" name="menu_btn" {{($now=='setting')?'checked':''}} hidden>
               <label for="menu_btn2" class="link-btn {{($now=='setting')?'active':''}}">
                   <div class="info" >
                       <div class="icon mr-3">
                           <i class="fas fa-cogs"></i>
                       </div>
                       <div class="text">
                           <h6>系統設定</h6>
                           <p>Setting</p>
                       </div>
                   </div>
                   <i class="fa fa-caret-left arrow"></i>
               </label>
               <div class="list_box">
                   <ul>
                       <li>
                           <a href="{{url('/backstage/setting')}}">
                               <i class="fa fa-cogs"></i>
                               網站資訊
                           </a>
                       </li>
                       <li>
                           <a href="{{url('/backstage/pagelow')}}">
                               <i class="fa fa-cogs"></i>
                               頁尾設定
                           </a>
                       </li>
                       <li>
                           <a href="{{url('/backstage/social')}}">
                               <i class="fa fa-cogs"></i>
                               社群連結
                           </a>
                       </li>
                   </ul>
               </div>
           </li>
           <li>
               <a href="{{url('/backstage/administrator')}}" class="link-btn {{($now=='administrator')?'active':''}}">
                   <div class="info">
                       <div class="icon mr-3">
                           <i class="fa fa-user-shield"></i>
                       </div>
                       <div class="text">
                           <h6>管理帳戶</h6>
                           <p>administrator</p>
                       </div>
                   </div>
               </a>
           </li>
           <li>
               <a href="{{url('/backstage/syslog')}}" class="link-btn {{($now=='syslog')?'active':''}}">
                   <div class="info">
                       <div class="icon mr-3">
                           <i class="fa fa-save"></i>
                       </div>
                       <div class="text">
                           <h6>操作日誌</h6>
                           <p>System Log</p>
                       </div>
                   </div>
               </a>
           </li>
       </ul>
       @endif
        <label class="menu-off" for="menu-ctrl">
            <i class="fa fa-chevron-left"></i>收合
        </label>
    </div>
</div>

<label class="menu_on_btn " for="menu-ctrl">
    <p>選<br>單<i class="fa fa-chevron-right"></i></p>
</label>
<label for="menu-user-data" class="menu-user-block"></label>
