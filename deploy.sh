NAME=$(basename `dirname $PWD`)
TAG=${1}
SVN="../svn/"

# Check the user has passed an argument
if [[ -z $TAG ]]; then
  echo "usage: ./deploy.sh TAG"
  exit 1
fi

# Check the tag actually exists in Git
if ! git rev-parse --verify -q $TAG > /dev/null; then
  echo "Not a valid Git tag: $TAG"
  exit 1
fi

# Create a tag in svn, and export the code there
DEST="$SVN/tags/$TAG"

if [ -d "$DEST" ]; then
  echo "Tag $TAG already exists in SVN"
  exit 1
else
  mkdir "$DEST"
fi

git archive $TAG | tar -x -C "$DEST"

# Update the readme
cp "$DEST/readme.txt" "$SVN/trunk/readme.txt"

# Commit to SVN
cd "$SVN"
svn add "$DEST"
svn commit -m "$NAME $TAG"
svn update
