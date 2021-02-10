<?php

namespace Tests\Browser;

use Facebook\WebDriver\WebDriverBy;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class LaraCastTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws Throwable
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $series = [
                "advanced-eloquent",
                "alpine-essentials",
                "billing-with-laravel-cashier",
                "blade-component-cookbook",
                "browser-testing-with-laravel-dusk",
                "build-a-laravel-app-with-tdd",
                "build-and-configure-a-staging-server",
                "build-a-stock-tracker-app",
                "build-a-video-game-aggregator",
                "building-alpinejs",
                "building-laracasts",
                "charting-and-you",
                "code-katas-with-phpunit",
                "code-reflections",
                "css-grids-for-everyone",
                "css-quirks-and-pitfalls",
                "cypress-and-laravel-integration",
                "design-patterns-in-php",
                "discover-symfony-components",
                "do-you-react",
                "eloquent-relationships",
                "eloquent-techniques",
                "envoyer",
                "es6-cliffsnotes",
                "get-real-with-laravel-echo",
                "git-me-some-version-control",
                "guest-spotlight",
                "hands-on-community-contributions",
                "how-do-i",
                "how-to-accept-payments-with-stripe",
                "how-to-be-awesome-in-phpstorm",
                "how-to-build-command-line-apps-in-php",
                "how-to-create-custom-presets",
                "how-to-manage-an-open-source-project",
                "how-to-read-code",
                "how-to-use-html5-video-and-videojs",
                "intermediate-laravel",
                "intuitive-integration-testing",
                "javascript-techniques-for-server-side-developers",
                "laravel-6-from-scratch",
                "laravel-authentication-options",
                "laravel-authentication-techniques",
                "laravel-explained",
                "laravel-from-scratch-2018",
                "laravel-nova-mastery",
                "laravel-spark",
                "laravel-vue-and-spas",
                "learn-flexbox-through-examples",
                "learn-laravel-and-redis-through-examples",
                "learn-laravel-forge",
                "learn-laravel-horizon",
                "learn-laravel-mix",
                "learn-laravel-scout",
                "learn-socialite",
                "learn-telescope",
                "learn-vue-2-step-by-step",
                "lets-build-a-forum-with-laravel",
                "livewire-basics",
                "modern-css-for-backend-developers",
                "modern-css-workflow",
                "multitenancy-in-practice",
                "mysql-database-design",
                "object-oriented-principles-in-php",
                "open-closed-workshop",
                "php7-up-and-running",
                "php8-crash-course",
                "php-bits",
                "php-for-beginners",
                "php-testing-jargon",
                "phpunit-testing-in-laravel",
                "playing-with-php",
                "practical-vue-components",
                "professional-php-workflow-in-sublime-text",
                "pull-a-seat-season-1",
                "queue-it-up",
                "real-time-laravel-with-socket-io",
                "refactoring-workshops",
                "russian-doll-caching-in-laravel",
                "setup-a-mac-dev-machine-from-scratch",
                "simple-rules-for-simpler-code",
                "solid-principles-in-php",
                "spam-prevention-techniques",
                "static-site-generators",
                "sublime-text-mastery",
                "tailwind-css-rebuilds-github",
                "ten-techniques-for-cleaner-code",
                "testing-jargon",
                "testing-vue",
                "the-lifecycle-of-a-new-feature",
                "three-minute-tips",
                "understanding-regular-expressions",
                "unlocking-badges-workshop",
                "vim-mastery",
                "visual-studio-code-for-php-developers",
                "webpack-for-everyone",
                "whatcha-working-on",
                "whats-new-in-laravel-5-1",
                "whats-new-in-laravel-5-2",
                "whats-new-in-laravel-5-3",
                "whats-new-in-laravel-5-4",
                "whats-new-in-laravel-5-5.html",
                "whats-new-in-laravel-5-6",
                "whats-new-in-laravel-5-7",
                "whats-new-in-laravel-5-8",
                "whats-new-in-laravel-6",
                "whats-new-in-laravel-7",
                "whats-new-in-laravel-8",
                "whats-new-in-php-7-1",
                "whats-new-in-php-74",
                "whats-new-in-vue-3",
                "whip-monstrous-code-into-shape",
            ];
            foreach ($series as $item) {
                $browser
                    ->visit('https://larastore.ir/auth/login')
                    ->pause(1000)
                    ->type('username', '6b0t8hfxu@relay.firefox.com')
                    ->type('password', 'Abcdefgh1')
                    ->press('ورود')
                    ->visit("https://larastore.ir/series/$item");
                $episodes_count = $browser->driver
                    ->findElement(WebDriverBy::xpath('/html/body/main/section[1]/div/div/div[1]/div[2]/span[2]/span'))
                    ->getText();

                for ($i = 1; $i <= $episodes_count; $i++) {
                    $browser->visit("https://larastore.ir/series/$item/episodes/$i")
                        ->pause(10000);

                    $browser->driver
                        ->findElement(WebDriverBy::linkText('دانلود ویدئو'))
                        ->click();

                    $URL = $browser->driver->getCurrentURL();
                    DB::table('laracast_links')->insert([
                        'link' => $URL,
                        'course' => $item,
                    ]);
                }
            }
        });
    }
}
