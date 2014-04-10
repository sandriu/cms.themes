<button type="button" class="btn btn-info btn-xs" data-toggle="collapse" data-target="#status-legend">
    <?php
        echo t('Show Population status legend');
    ?>
</button>

<div class="clearfix">&nbsp;</div>
<div id="status-legend" class="collapse out">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="3" class="col-md-2"><?php echo t('Column'); ?> A</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td rowspan="3" class="col-md-2"><?php echo t('Category'); ?> 1</td>
                <td>(a)</td>
                <td><?php echo t('Species, which are included in Appendix I to the Convention on the Conservation of Migratory species of Wild Animals;'); ?></td>
            </tr>
            <tr>
                <td>(b)</td>
                <td><?php echo t('Species, which are listed as threatened on the IUCN Red list of Threatened Species, as reported in the most recent summary by BirdLife International; or'); ?></td>
            </tr>
            <tr>
                <td>(c)</td>
                <td><?php echo t('Populations, which number less than around 10,000 individuals.'); ?></td>
            </tr>

            <tr>
                <td class="col-md-2"><?php echo t('Category'); ?> 2</td>
                <td colspan="2"><?php echo t('Populations numbering between around 10,000 and around 25,000 individuals.'); ?></td>
            </tr>

            <tr>
                <td rowspan="5" class="col-md-2"><?php echo t('Category'); ?> 3</td>
                <td colspan="2">
                    <?php echo t('Populations numbering between around 25,000 and around 100,000 individuals and considered to be at risk as a result of:'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    (a)
                </td>
                <td>
                    <?php echo t('Concentration onto a small number of sites at any stage of their annual cycle;'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    (b)
                </td>
                <td>
                    <?php echo t('Dependence on a habitat type, which is under severe threat;'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    (c)
                </td>
                <td>
                    <?php echo t('Showing significant long-term decline; or'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    (d)
                </td>
                <td>
                    <?php echo t('Showing large fluctuations in population size or trend.'); ?>
                </td>
            </tr>

            <tr>
                <td class="col-md-2"><?php echo t('Category'); ?> 4</td>
                <td colspan="2"><?php echo t('Species, which are listed as Near Threatened on the IUCN Red List of Threatenend species, as reported in the most recent summary by BirdLife International, but do not fulfil the conditions in respect of Category 1, 2 or 3, as decribed above, and which are pertinent for international action.'); ?></td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="3"><?php echo t('Column'); ?> B</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="col-md-2"><?php echo t('Category'); ?> 1</td>
                <td colspan="2"><?php echo t('Populations numbering between around 25,000 and around 100,000 individuals and which do not fulfil the conditions in respect of Column A, as described above.'); ?></td>
            </tr>

            <tr>
                <td rowspan="5" class="col-md-2"><?php echo t('Category'); ?> 2</td>
                <td colspan="2">
                    <?php echo t('Populations numbering more than around 100,000 individuals and considered to be in need of special attention as a result of:'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    (a)
                </td>
                <td>
                    <?php echo t('Concentration onto a small number of sites at any stage of their annual cycle;'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    (b)
                </td>
                <td>
                    <?php echo t('Dependence on a habitat type, which is under severe threat;'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    (c)
                </td>
                <td>
                    <?php echo t('Showing significant long-term decline; or'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    (d)
                </td>
                <td>
                    <?php echo t('Showing large fluctuations in population size or trend.'); ?>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="3"><?php echo t('Column'); ?> C</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="col-md-2"><?php echo t('Column'); ?> 1</td>
                <td colspan="2"><?php echo t('Populations numbering more than around 100,000 individuals which could significantly benefit from international cooperation and which do not fulfil the conditions in respect of either Column A or Column B, above.'); ?></td>
            </tr>
        </tbody>
    </table>

    <p>(): <?php echo t('Populations numbering more than around 100,000 individuals which could significantly benefit from international cooperation and which do not fulfil the conditions in respect of either Column A or Column B, above.'); ?></p>
    <p>*: <?php echo t('By way of exception for those populations listed in Categories 2 and 3 in Column A and
    which are marked by an asterisk, hunting may continue on a sustainable use basis. This
    sustainable use shall be conducted within the framework of special provisions of an
    international species action plan, which shall seek to implement the principles of adaptive
    harvest management (see paragraph 2.1.2 of Annex 3 to the Agreement).'); ?></p>
</div>
