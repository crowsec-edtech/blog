# Use the official .NET SDK image as a build stage
FROM mcr.microsoft.com/dotnet/sdk:7.0 AS build
WORKDIR /app

# Copy csproj and restore as distinct layers
COPY *.csproj ./
RUN dotnet restore

# Copy everything else and build
COPY . ./
RUN dotnet publish -c Release -o out

# Build runtime image
FROM mcr.microsoft.com/dotnet/aspnet:7.0 AS runtime
WORKDIR /app
COPY --from=build /app/out ./

# Expose the port your app will run on
EXPOSE 80

# Creating flag
RUN echo "CROWSEC{Expl01t1ng_1ns3cur3_d3s3r14l1z4t10n_l1k3_4_PR0}" > /flag.txt

# Set the entry point
ENTRYPOINT ["dotnet", "Example.dll"]
