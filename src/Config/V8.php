<?php

namespace Bdt\Avetmiss\Config;

/**
 * Class for AVETMISS Version 7 options.
 */
class V8 extends Config
{

    /**
     * @var array
     */
    protected static $recognitionStatus = [
        '11' => 'Nationally accredited qualification designed to lead to a qualification specified in a national Training Package',
        '12' => 'Nationally recognised accredited course, other than a qualification designed to lead to a qualification specified in a national Training Package',
        '14' => 'Other courses'
    ];

    /**
     * @var array
     */
    protected static $qualificationCategories = [
        '211' => 'Graduate Diploma',
        '213' => 'Professional Specialist Qualification at Graduate Diploma Level',
        '221' => 'Graduate Certificate',
        '222' => 'Professional Specialist Qualification at Graduate Certificate Level',
        '311' => 'Bachelor Degree (Honours)',
        '312' => 'Bachelor Degree (Pass)',
        '411' => 'Advanced Diploma',
        '413' => 'Associate Degree',
        '421' => 'Diploma',
        '511' => 'Certificate IV',
        '514' => 'Certificate III',
        '521' => 'Certificate II',
        '524' => 'Certificate I',
        '611' => 'Year 12',
        '613' => 'Year 11',
        '621' => 'Year 10',
        '912' => 'Other Non-award Courses',
        '991' => 'Statement of Attainment Not Identifiable by Level',
        '992' => 'Bridging and Enabling Courses Not Identifiable by Level',
        '999' => 'Education not elsewhere classified'
    ];

    /**
     * @var array
     */
    protected static $fundingSourceNational = [
        '11' => 'Commonwealth and state general purpose recurrent',
        '13' => 'Commonwealth specific purpose programs',
        '15' => 'State specific purpose programs',
        '20' => 'Domestic full fee-paying client',
        '30' => 'International full fee-paying client',
        '80' => 'Revenue earned from another registered training organisation'
    ];

    /**
     * @var array
     */
    protected static $commencingCourseOptions = [
        '3' => 'Commencing enrolment in the qualification or course',
        '4' => 'Continuing enrolment in the qualification or course from a previous year',
        '8' => 'Unit of competency or module enrolment only'
    ];

    /**
     * @var array
     */
    protected static $vetFlagOptions = [
        'Y' => 'Yes - The intention of the program of study is vocational',
        'N' => 'No - The intention of the program of study is not vocational'
    ];

    /**
     * @var array
     */
    protected static $predominantDeliveryModes = [
        'I' => 'Internal delivery (e.g. classroom based)',
        'E' => 'External delivery (e.g. online)',
        'W' => 'Workplace based delivery',
        'N' => 'Not applicable (e.g. RPL & CT)'
        ];

    /**
     * @var array
     */
    protected static $deliveryModeIdentifiers = [
        'YNN' => 'Internal only',
        'NYN' => 'External only',
        'NNY' => 'Workplace based only',
        'YYN' => 'Combination of internal and external',
        'YNY' => 'Combination of internal and workplace based',
        'NYY' => 'Combination of external and workplace based',
        'YYY' => 'Combination of all modes',
        'NNN' => 'Not applicable (RPL or credit transfer)'
    ];

    /**
     * @var array
     */
    protected static $deliveryTypes = [
        '10' => 'Classroom-based',
        '20' => 'Electronic based',
        '30' => 'Employment based',
        '40' => 'Other delivery (eg correspondence)',
        '90' => 'Not applicable - recognition of prior learning/ recognition of current competency/ credit transfer'
    ];

    /**
     * @var array
     */
    protected static $deliveryTypeNotApplicableOutcomes = [
        51,
        52,
        53,
        54,
        60,
        // Commenting these out because we're in an interum version, not quite in V8 yet but this change is currently active for V7
        // 81,
        // 82
    ];

    /**
     * @var array
     */
    protected static $outcomeStatusOptions = [
        20 => 'Competency achieved/pass',
        30 => 'Competency not achieved/fail',
        40 => 'Withdrawn',
        51 => 'Recognition of prior learning - granted',
        52 => 'Recognition of prior learning - not granted',
        53 => 'Recognition of current competency - granted',
        54 => 'Recognition of current competency - not granted',
        60 => 'Credit transfer',
        65 => 'Gap Training',
        70 => 'Continuing enrolment',
        81 => 'Non-assessed enrolment - Satisfactorily completed',
        82 => 'Non-assessed enrolment - Withdrawn or not satisfactorily completed',
    ];

    /**
     * @var array
     */
    protected static $outcomeStatusCodes = [
        20,
        30,
        40,
        51,
        52,
        53,
        54,
        60,
        70,
        81,
        82,
        90
    ];

    /**
     * @var array
     */
    protected static $noCompletionWithOutcomeStatus = [
        30,
        40,
        52,
        54
    ];

    /**
     * @var array
     */
    protected static $studyReasonOptions = [
        '01' => 'To get a job',
        '02' => 'To develop my existing business',
        '03' => 'To start my own business',
        '04' => 'To try for a different career',
        '05' => 'To get a better job or promotion',
        '06' => 'It was a requirement of my job',
        '07' => 'I wanted extra skills for my job',
        '08' => 'To get into another course of study',
        '11' => 'Other reasons',
        '12' => 'For personal interest or self-development',
        '13' => 'To get skills for community/voluntary work',
    ];

    /**
     * @var array
     */
    protected static $states = [
        '01' => 'New South Wales',
        '02' => 'Victoria',
        '03' => 'Queensland',
        '04' => 'South Australia',
        '05' => 'Western Australia',
        '06' => 'Tasmania',
        '07' => 'Northern Territory',
        '08' => 'Australian Capital Territory',
        '09' => 'Other Australian Territories or Dependencies',
        '99' => 'Other (Overseas but not an Australian Territory or Dependency)'
    ];

    /**
     * @var array
     */
    protected static $statesShort = [
        '01' => 'NSW',
        '02' => 'VIC',
        '03' => 'QLD',
        '04' => 'SA',
        '05' => 'WA',
        '06' => 'TAS',
        '07' => 'NT',
        '08' => 'ACT',
        '09' => 'Other Australian Territories or Dependencies',
        '99' => 'Other (Overseas but not an Australian Territory or Dependency)'
    ];

    /**
     * @var array
     */
    protected static $clientTitles = [
        'Mr'   => 'Mr',
        'Mrs'  => 'Mrs',
        'Miss' => 'Miss',
        'Ms'   => 'Ms',
        'Dr'   => 'Dr',
        'Rev'  => 'Rev',
        'Hon'  => 'Hon',
        'Sir'  => 'Sir',
        'Mx'   => 'Mx'
    ];

    /**
     * @var array
     */
    protected static $schoolTypes = [
        '21'   => 'School - Government',
        '25'  => 'School - Catholic',
        '27' => 'School - Independent',
        '31'   => 'Technical and Further Education institute',
        '61'   => 'Community based adult education provider',
        '91'  => 'Privately operated registered training organisation',
        '92'  => 'Home school arrangement'
    ];

    /**
     * @var array
     */
    protected static $surveyContactStatuses = [
        'A'   => 'Available for survey use',
        'C' => 'Correctional facility (address or enrolment)',
        'D'   => 'Deceased student',
        'E'   => 'Excluded from survey use',
        'I'  => 'Invalid address/itinerant student (very low likelihood of response)',
        'M'  => 'Minor - Under age of 15 (Not to be surveyed)',
        'O' => 'Overseas (address or enrolment)'
    ];

    /**
     * @var array
     */
    protected static $clientSex = [
        'M' => 'Male',
        'F' => 'Female',
        'X' => 'Other'
    ];

    /**
     * @var array
     */
    protected static $booleans = [
        'Y' => 'Yes',
        'N' => 'No'
    ];

    /**
     * @var array
     */
    protected static $booleanOptions = [
        '1' => 'Yes',
        '0' => 'No'
    ];

    /**
     * @var array
     */
    protected static $atSchool = [
        'Y' => 'Yes - the client is still attending secondary school',
        'N' => 'No - the client is not attending secondary school'
    ];

    /**
     * @var array
     */
    protected static $highestSchoolLevelCompleted = [
        '02' => 'Did not go to school',
        '08' => 'Year 8 or below',
        '09' => 'Year 9 or equivalent',
        '10' => 'Completed Year 10',
        '11' => 'Completed Year 11',
        '12' => 'Completed Year 12'
    ];

    /**
     * @var array
     */
    protected static $priorEducationAchievements = [
        '008' => 'Bachelor Degree or Higher Degree level (defined for AVETMISS use only)',
        '410' => 'Advanced Diploma or Associate Degree Level',
        '420' => 'Diploma Level',
        '511' => 'Certificate IV',
        '514' => 'Certificate III',
        '521' => 'Certificate II',
        '524' => 'Certificate I',
        '990' => 'Miscellaneous Education'
    ];

    /**
     * @var array
     */
    protected static $labourForceStatus = [
        '01' => 'Full-time employee',
        '02' => 'Part-time employee',
        '03' => 'Self-employed - not employing others',
        '04' => 'Employer',
        '05' => 'Employed - unpaid worker in a family business',
        '06' => 'Unemployed - seeking full-time work',
        '07' => 'Unemployed - seeking part-time work',
        '08' => 'Not employed - not seeking employment'
    ];

    /**
     * @var array
     */
    protected static $clientIndigenousStatus = [
        '1' => 'Yes, Aboriginal',
        '2' => 'Yes, Torres Strait Islander',
        '3' => 'Yes, Aboriginal AND Torres Strait Islander',
        '4' => 'No, Neither Aboriginal nor Torres Strait Islander',
        '@' => 'Not stated (Question asked of the client but no answer provided)'
    ];

    /**
     * @var array
     */
    protected static $proficiencyInSpokenEnglish = [
        '1' => 'Very well',
        '2' => 'Well',
        '3' => 'Not well',
        '4' => 'Not at all',
        '@' => 'Not stated',
    ];

    /**
     * @var array
     */
    protected static $disabilityTypes = [
        '11' => 'Hearing/Deaf',
        '12' => 'Physical',
        '13' => 'Intellectual',
        '14' => 'Learning',
        '15' => 'Mental Illness',
        '16' => 'Acquired Brain Impairment',
        '17' => 'Vision',
        '18' => 'Medical Condition',
        '19' => 'Other',
        '99' => 'Unspecified'
    ];
}
