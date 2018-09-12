<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Nibh vestibulum vel vehicula lectus cras eget, laoreet nullam ullamcorper consectetuer sodales pulvinar neque, erat rhoncus consectetuer, at pharetra tempus pede morbi sapien. Consectetuer suspendisse eros justo feugiat varius, malesuada ac porta wisi sed ipsum porta, ac luctus, sagittis nulla ornare, orci urna ut mus eu. </p>
    </div>
    <div class="sidebar-module">
        <h4>Archives</h4>
        <ol class="list-unstyled">
            @foreach($archives as $stat)
                <li>
                    <a href="/?month={{$stat['month']}}&year={{$stat['year']}}">
                        {{ $stat['month'] . " " . $stat['year'] }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>

    <div class="sidebar-module">
        <h4>Tags</h4>
        <ol class="list-unstyled">
            @foreach($tags as $tag)
                <li>
                    <a href="/posts/tags/{{ $tag }}">
                        {{ $tag }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>

    <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>
</div><!-- /.posts-sidebar -->
