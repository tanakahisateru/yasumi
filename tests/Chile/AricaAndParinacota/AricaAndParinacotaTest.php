<?php declare(strict_types=1);
/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2019 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace Yasumi\tests\Chile\AricaAndParinacota;

use ReflectionException;
use Yasumi\Holiday;

/**Class
 * Class for testing holidays in Arica and Parinacota (Chile).
 */
class AricaAndParinacotaTest extends AricaAndParinacotaBaseTestCase
{
    /**
     * @var int year random year number used for all tests in this Test Case
     */
    protected $year;

    /**
     * Tests if all national holidays in Arica and Parinacota are defined by the provider class
     *
     * @throws ReflectionException
     */
    public function testNationalHolidays(): void
    {
        $nationalHolidays = ['newYearsDay', 'goodFriday', 'stPeterPaulsDay', 'assumptionOfMary'];

        if ($this->year >= 1932) {
            $nationalHolidays[] = 'internationalWorkersDay';
        }

        if (1982 === $this->year) {
            $nationalHolidays[] = '1982CensusDay';
        }

        if (1992 === $this->year) {
            $nationalHolidays[] = '1992CensusDay';
        }

        if (2002 === $this->year) {
            $nationalHolidays[] = '2002CensusDay';
        }

        if (2017 === $this->year) {
            $nationalHolidays[] = '2017CensusDay';
        }

        if ($this->year >= 1915) {
            $nationalHolidays[] = 'navyDay';
        }

        $nationalHolidays[] = 'battleOfArica';

        $this->assertDefinedHolidays($nationalHolidays, self::REGION, $this->year, Holiday::TYPE_OFFICIAL);
    }

    /**
     * Tests if all observed holidays in Arica and Parinacota are defined by the provider class
     *
     * @throws ReflectionException
     */
    public function testObservedHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_OBSERVANCE);
    }

    /**
     * Tests if all seasonal holidays in Arica and Parinacota are defined by the provider class
     *
     * @throws ReflectionException
     */
    public function testSeasonalHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_SEASON);
    }

    /**
     * Tests if all bank holidays in Arica and Parinacota are defined by the provider class
     *
     * @throws ReflectionException
     */
    public function testBankHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_BANK);
    }

    /**
     * Tests if all other holidays in Arica and Parinacota are defined by the provider class
     *
     * @throws ReflectionException
     */
    public function testOtherHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_OTHER);
    }

    /**
     * Initial setup of this Test Case
     */
    protected function setUp(): void
    {
        $this->year = $this->generateRandomYear(1981);
    }
}