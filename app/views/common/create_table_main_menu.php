<div>
    <ul>
        <li style="display: inline">
            <a href="<?= site_url( 'curriculum/view/' ) ?>">View CV</a>
        </li> |
        <li style="display: inline">
            <a href="<?= site_url( 'curriculum/edit/' ) ?>">Edit CV</a>
        </li> |
        <li style="display: inline">
            <a href="<?= site_url( 'educationalqualifications/' ) ?>">Educ. Qualifications</a>
        </li> |
        <li style="display: inline">
            <a href="<?= site_url( 'professionalqualifications/' ) ?>">Prof. Qualifications</a>
        </li> |
        <li style="display: inline">
            <a href="<?= site_url( 'experiences/' ) ?>">Working Experience</a>
        </li> |
        <li style="display: inline">
            <a href="<?= site_url( 'skills/' ) ?>">Skills</a>
        </li> |
        <li style="display: inline">
            <a href="<?= site_url( 'referees/' ) ?>">Referees</a>
        </li> |
        <?php if ( $_isAdmin ): ?>
            <li style="display: inline">
                <a href="<?= site_url( 'collate/' ) ?>">Search</a>
            </li> |
            <li style="display: inline">
                <a href="<?= site_url( 'employmentlevels/' ) ?>">Employment Levels</a>
            </li> |
            <li style="display: inline">
                <a href="<?= site_url( 'jobtitles/' ) ?>">Job Titles</a>
            </li> |
            <li style="display: inline">
                <a href="<?= site_url( 'sectors/' ) ?>">Job Sectors</a>
            </li> |
        <?php endif; ?>
        <li style="display: inline">
            <a href="<?= site_url( 'logout/' ) ?>">Logout</a>
        </li>
    </ul>
</div>
