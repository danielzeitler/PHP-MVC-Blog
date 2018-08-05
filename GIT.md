Command line instructions

Git global setup
git config --global user.name "Niklas B."
git config --global user.email "n.berend@sae.edu"

Create a new repository
git clone git@gitlab.com:nberend/php-mvc.git
cd php-mvc
touch README.md
git add README.md
git commit -m "add README"
git push -u origin master

Existing folder
cd existing_folder
git init
git remote add origin git@gitlab.com:nberend/php-mvc.git
git add .
git commit -m "Initial commit"
git push -u origin master

Existing Git repository
cd existing_repo
git remote rename origin old-origin
git remote add origin git@gitlab.com:nberend/php-mvc.git
git push -u origin --all
git push -u origin --tags
