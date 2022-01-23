import os
d = '.'
dirs = [os.path.join(d, o) for o in os.listdir(d) if os.path.isdir(os.path.join(d,o))]


for sub in dirs:
	subsubdirectories = [x[0] for x in os.walk(sub)]
	for subsub in subsubdirectories:
		path, dirs, files = next(os.walk(subsub))
		fileCount = len(files)
		print(subsub, fileCount)
