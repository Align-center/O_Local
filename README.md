This is a test website for a client, I follow they needs to realize it. The finished project isn't hosted yet.

I choose to make my own MVC architecture, mainly as a challenge and also because it'd be easier to add functionalities and pages. I also did a routing so the URL is clearer and the SEO is a little better as Google don't like "project/website/front/index.php" in the URLs. (cf. routes.php and classes/Route.php)

The website has a back-office; to access it, my client didn't want a link displayed on the website. So you only need to add "backOffice/backOffice.php" after the domain (the backOffice doesn't use the routing system, because it is not supposed to be referenced by Google so we don't really care). The back-office is not using the MVC system but is cut in different part to gain clarity.

To access some of the pages, you need to create yourself an account, and for the back-office I left in the database file credentials admin admin.

Obviously all the informations displayed on the website are not the real ones.