<?php /** @var $_jobseeker Jobseeker */ ?>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-2 column">
            <img alt="140x140" src="http://lorempixel.com/140/140/" class="img-circle"/>
        </div>
        <div class="col-md-10 column">
            <div class="row clearfix">
                <div class="col-md-8 column">
                    <h1 class="text-left">
                        <?= $_jobseeker->getFullName(); ?>
                    </h1>

                    <p>
                        <?= $_jobseeker->getAuthorityToWorkStatement(); ?>
                    </p>
                </div>
                <div class="col-md-4 column">
                    <address>
                        <?= $_jobseeker->getFullAddress(); ?>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-4 column">
            <h4>Contact</h4>
            <abbr title="Email">E:</abbr> <?= $_jobseeker->getUsername(); ?>
            <?php if ( !empty( $email2 = $_jobseeker->getSecondEmail() ) && $email2 != $_jobseeker->getUsername() ) : ?>
                <br/><abbr title="Email2">E:</abbr> <?= $email2; ?>
            <?php endif; ?>
            <?php if ( !empty( $landline = $_jobseeker->getLandline() ) ) : ?>
                <br/><abbr title="Phone">P:</abbr> <?= $landline; ?>
            <?php endif; ?>
            <?php if ( !empty( $mobile = $_jobseeker->getMobile() ) ) : ?>
                <br/><abbr title="Mobile">M:</abbr> <?= $mobile; ?>
            <?php endif; ?>
            <?php if ( !empty( $personalUrl = $_jobseeker->getPersonalUrl() ) ) : ?>
                <br/><abbr title="Web">W:</abbr> <?= $personalUrl; ?>
            <?php endif; ?>
            <?php if ( !empty( $contactPreference = $_jobseeker->getContactPreference() ) ) : ?>
                    <br/><em>Contact preference: <?= $contactPreference ?></em>
            <?php endif; ?>
        </div>
        <div class="col-md-4 column">
            <h4>Educational details</h4>
            <ul>
                <?php if ( !empty( $educationLevel = $_jobseeker->getEducationLevel() ) ) : ?>
                    <li>
                        Education level: <?= $educationLevel ?>
                    </li>
                <?php endif; ?>
                <?php if ( !empty( $noOfGcses = $_jobseeker->getNoOfGCses() ) ) : ?>
                    <li>
                        No of GCSEs: <?= $noOfGcses ?>
                    </li>
                <?php endif; ?>
                <?php if ( !empty( $gcseEnglishGrade = $_jobseeker->getGcseEnglishGrade() ) ) : ?>
                    <li>
                        GCSE English grade: <?= $gcseEnglishGrade ?>
                    </li>
                <?php endif; ?>
                <?php if ( !empty( $gcseMathsGrade = $_jobseeker->getGcseMathsGrade() ) ) : ?>
                    <li>
                        GCSE Maths grade: <?= $gcseMathsGrade ?>
                    </li>
                <?php endif; ?>
                <?php if ( !empty( $noOfAlevels = $_jobseeker->getNoOfAlevels() ) ) : ?>
                    <li>
                        No of A Levels: <?= $noOfAlevels ?>
                    </li>
                <?php endif; ?>
                <?php if ( !empty( $ucasPoints = $_jobseeker->getUcasPoints() ) ) : ?>
                    <li>
                        UCAS points: <?= $ucasPoints ?>
                    </li>
                <?php endif; ?>
                <?php if ( !empty( $studenStatus = $_jobseeker->getStudentStatus() ) ) : ?>
                    <li>
                        Student status: <?= $studenStatus ?>
                    </li>
                <?php endif; ?>
                <?php if ( !empty( $penaltyPoints = $_jobseeker->getPenaltyPoints() ) ) : ?>
                    <li>
                        Penalty points: <?= $penaltyPoints ?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col-md-4 column">
            <h4>Skills</h4>
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
    </div>
</div>
