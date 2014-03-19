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
            <?php $email2 = $_jobseeker->getSecondEmail() ?>
            <?php if ( !empty( $email2 ) && $email2 != $_jobseeker->getUsername() ) : ?>
                <br/><abbr title="Email2">E:</abbr> <?= $email2; ?>
            <?php endif; ?>
            <?php $landline = $_jobseeker->getLandline()  ?>
            <?php if ( !empty( $landline) ) : ?>
                <br/><abbr title="Phone">P:</abbr> <?= $landline; ?>
            <?php endif; ?>
            <?php $mobile = $_jobseeker->getMobile() ?>
            <?php if ( !empty( $mobile ) ) : ?>
                <br/><abbr title="Mobile">M:</abbr> <?= $mobile; ?>
            <?php endif; ?>
            <?php $personalUrl = $_jobseeker->getPersonalUrl() ?>
            <?php if ( !empty( $personalUrl ) ) : ?>
                <br/><abbr title="Web">W:</abbr> <?= $personalUrl; ?>
            <?php endif; ?>
            <?php $contactPreference = $_jobseeker->getContactPreference() ?>
            <?php if ( !empty( $contactPreference ) ) : ?>
                    <br/><em>Contact preference: <?= $contactPreference ?></em>
            <?php endif; ?>
        </div>
        <div class="col-md-4 column">
            <h4>Educational details</h4>
            <ul>
                <?php $educationLevel = $_jobseeker->getEducationLevel() ?>
                <?php if ( !empty( $educationLevel ) ) : ?>
                    <li>
                        Education level: <?= $educationLevel ?>
                    </li>
                <?php endif; ?>
                <?php $noOfGcses = $_jobseeker->getNoOfGCses() ?>
                <?php if ( !empty( $noOfGcses ) ) : ?>
                    <li>
                        No of GCSEs: <?= $noOfGcses ?>
                    </li>
                <?php endif; ?>
                <?php $gcseEnglishGrade = $_jobseeker->getGcseEnglishGrade() ?>
                <?php if ( !empty( $gcseEnglishGrade ) ) : ?>
                    <li>
                        GCSE English grade: <?= $gcseEnglishGrade ?>
                    </li>
                <?php endif; ?>
                <?php $gcseMathsGrade = $_jobseeker->getGcseMathsGrade() ?>
                <?php if ( !empty( $gcseMathsGrade ) ) : ?>
                    <li>
                        GCSE Maths grade: <?= $gcseMathsGrade ?>
                    </li>
                <?php endif; ?>
                <?php $noOfAlevels = $_jobseeker->getNoOfAlevels() ?>
                <?php if ( !empty( $noOfAlevels ) ) : ?>
                    <li>
                        No of A Levels: <?= $noOfAlevels ?>
                    </li>
                <?php endif; ?>
                <?php $ucasPoints = $_jobseeker->getUcasPoints() ?>
                <?php if ( !empty( $ucasPoints ) ) : ?>
                    <li>
                        UCAS points: <?= $ucasPoints ?>
                    </li>
                <?php endif; ?>
                <?php $studenStatus = $_jobseeker->getStudentStatus() ?>
                <?php if ( !empty( $studenStatus ) ) : ?>
                    <li>
                        Student status: <?= $studenStatus ?>
                    </li>
                <?php endif; ?>
                <?php $penaltyPoints = $_jobseeker->getPenaltyPoints() ?>
                <?php if ( !empty( $penaltyPoints ) ) : ?>
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
