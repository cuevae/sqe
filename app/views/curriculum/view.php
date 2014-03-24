<div class="container">
    <div class="row clearfix">
        <div class="col-md-2 column">
            <?php if ( $_jobseeker->isFemale() ) : ?>
                <img alt="140x140" src="http://lorempixel.com/140/140/people/9" class="img-circle"/>
            <?php else: ?>
                <img alt="140x140" src="http://lorempixel.com/140/140/business/7" class="img-circle"/>
            <?php endif; ?>
        </div>
        <div class="col-md-10 column">
            <div class="row clearfix">
                <div class="col-md-8 column">
                    <h1 class="text-left">
                        <?= $_jobseeker->getFullName(); ?>
                        <?php if ( !isset( $_alreadyPdf ) ): ?>
                            <small><a href="<?= site_url( 'curriculum/pdf/' . $_jobseeker->getId() ) ?>">pdf</a></small>
                        <?php endif; ?>
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
            <span title="Email">E:</span> <?= $_jobseeker->getUsername(); ?>
            <?php $email2 = $_jobseeker->getSecondEmail() ?>
            <?php if ( !empty( $email2 ) && $email2 != $_jobseeker->getUsername() ) : ?>
                <br/><span title="Email2">E:</span> <?= $email2; ?>
            <?php endif; ?>
            <?php $landline = $_jobseeker->getLandline() ?>
            <?php if ( !empty( $landline ) ) : ?>
                <br/><span title="Phone">P:</span> <?= $landline; ?>
            <?php endif; ?>
            <?php $mobile = $_jobseeker->getMobile() ?>
            <?php if ( !empty( $mobile ) ) : ?>
                <br/><span title="Mobile">M:</span> <?= $mobile; ?>
            <?php endif; ?>
            <?php $personalUrl = $_jobseeker->getPersonalUrl() ?>
            <?php if ( !empty( $personalUrl ) ) : ?>
                <br/><span title="Web">W:</span> <?= $personalUrl; ?>
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
            <?php if ( !isset( $_skills ) || empty( $_skills ) ): ?>
                <p>No skills added. Click <a href="<?= site_url( 'skills' ) ?>">here</a> to start adding</p>
            <?php else: ?>
                <ol>
                    <?php foreach ( $_skills as $_skill ): ?>
                        <li>
                            <?= $_skill->getFullName(); ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-4 column">
            <h4>Educational Qualifications</h4>
            <?php if ( !isset( $_edQualifications ) || empty( $_edQualifications ) ): ?>
                <p>No qualifications added. Click <a href="<?= site_url( 'educationalqualifications' ) ?>">here</a> to
                    start adding</p>
            <?php else: ?>
                <ol>
                    <?php foreach ( $_edQualifications as $_edQualification ): ?>
                        <li>
                            <?= $_edQualification->getQualificationFullName(); ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
        </div>
        <div class="col-md-4 column">
            <h4>Professional Qualifications</h4>
            <?php if ( !isset( $_profQualifications ) || empty( $_profQualifications ) ): ?>
                <p>No qualifications added. Click <a href="<?= site_url( 'professionalqualifications' ) ?>">here</a> to
                    start adding</p>
            <?php else: ?>
                <ol>
                    <?php foreach ( $_profQualifications as $_profQualification ): ?>
                        <li>
                            <?= $_profQualification->getFullName(); ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
        </div>
        <div class="col-md-4 column">
            <h4>Working Experience</h4>
            <?php if ( !isset( $_experiences ) || empty( $_experiences ) ): ?>
                <p>No working experiences added. Click <a href="<?= site_url( 'experiences' ) ?>">here</a> to start
                    adding</p>
            <?php else: ?>
                <ol>
                    <?php foreach ( $_experiences as $_experience ): ?>
                        <li>
                            <?= $_experience->getExperienceName(); ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <h4>Referees</h4>
            <?php if ( !isset( $_referees ) || empty( $_referees ) ): ?>
                <p>No referees added. Click <a href="<?= site_url( 'referees' ) ?>">here</a> to start adding</p>
            <?php else: ?>
                <ol>
                    <?php foreach ( $_referees as $_referee ): ?>
                        <li>
                            <?php $email = $_referee->getEmail() ? ' | ' . $_referee->getEmail() : '' ?>
                            <?php $contactNumber = $_referee->getContactPhone() ? ' | ' . $_referee->getContactPhone() : '' ?>
                            <?= $_referee->getFullName() . $email . $contactNumber; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
        </div>
    </div>
    <?php if ( !isset( $_alreadyPdf ) ): ?>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <p style="float: right;"><a href="<?= site_url( 'curriculum/edit/' . $_jobseeker->getId() ) ?>">Edit this CV</a></p>
            </div>
        </div>
    <?php endif; ?>
</div>
