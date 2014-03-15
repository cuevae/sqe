<div class="container">
    <div class="row clearfix">
        <div class="col-md-2 column">
            <img alt="140x140" src="http://lorempixel.com/140/140/" class="img-circle" />
        </div>
        <div class="col-md-10 column">
            <h3 class="text-left">
                <?=$_jobseeker->getFullName();?>
            </h3>
            <p>
                <?=$_jobseeker->getAuthorityToWorkStatement();?>
            </p>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-4 column">
            <address>
                <?=$_jobseeker->getFullAddress();?><br/>---
                <br/><abbr title="Phone">P:</abbr> <?=$_jobseeker->getLandline();?>
                <br/><abbr title="Mobile">M:</abbr> <?=$_jobseeker->getMobile();?>
                <br/><abbr title="Web">W:</abbr> <?=$_jobseeker->getPersonalUrl();?>
            </address>
        </div>
        <div class="col-md-4 column">
            <ul>
                <li>
                    Lorem ipsum dolor sit amet
                </li>
                <li>
                    Consectetur adipiscing elit
                </li>
                <li>
                    Integer molestie lorem at massa
                </li>
                <li>
                    Facilisis in pretium nisl aliquet
                </li>
                <li>
                    Nulla volutpat aliquam velit
                </li>
                <li>
                    Faucibus porta lacus fringilla vel
                </li>
                <li>
                    Aenean sit amet erat nunc
                </li>
                <li>
                    Eget porttitor lorem
                </li>
            </ul>
        </div>
        <div class="col-md-4 column">
            <ol>
                <li>
                    Lorem ipsum dolor sit amet
                </li>
                <li>
                    Consectetur adipiscing elit
                </li>
                <li>
                    Integer molestie lorem at massa
                </li>
                <li>
                    Facilisis in pretium nisl aliquet
                </li>
                <li>
                    Nulla volutpat aliquam velit
                </li>
                <li>
                    Faucibus porta lacus fringilla vel
                </li>
                <li>
                    Aenean sit amet erat nunc
                </li>
                <li>
                    Eget porttitor lorem
                </li>
            </ol>
        </div>
    </div>
</div>
